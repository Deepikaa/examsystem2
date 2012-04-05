<?php
# Name: Login.class.php
# Description: simple single user login script
# Author: ricocheting
# Web: http://www.ricocheting.com/code/php
# Update: 2010-06-06
# Version: 2.1
# Copyright 2003 ricocheting.com


/*
This script is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/



// username to login into page
define('LOGIN_USER', "admin");

// password to login into page
define('LOGIN_PASS', "adm");




###################################################################################################
###################################################################################################
###################################################################################################
# CLASS desc: for calling login authentication
# CLASS req: looks for constants LOGIN_USER and LOGIN_PASS
# Can be called:  ?action=clear_login   ?action=prompt
class Login{

    // unique prefix that is used with this object (on cookies and password salt)
    var $prefix = "login_";

    // days "remember me" cookies will remain
    var $cookie_duration = 21;


    // temporary values for comparing login are auto set here. do not set your own $user or $pass here
    var $user = "";
    var $pass = "";


#-#############################################
# desc: calls the rest of the functions depending on login state
# returns: nothing, but will print login prompt and die if necessary
function authorize(){

    //save cookie info to session
    if(isset($_COOKIE[$this->prefix.'user'])){
        $_SESSION[$this->prefix.'user'] = $_COOKIE[$this->prefix.'user'];
        $_SESSION[$this->prefix.'pass'] = $_COOKIE[$this->prefix.'pass'];
    }
    //    else{echo "no cookie<br>";}


    //if setting vars
    if(isset($_POST['action']) && $_POST['action'] == "set_login"){

        $this->user = $_POST['user'];
        $this->pass = md5($this->prefix.$_POST['pass']); //hash password. salt with prefix

        $this->check();//dies if incorrect

        //if "remember me" set cookie
        if(isset($_POST['remember'])){
            setcookie($this->prefix."user", $this->user, time()+($this->cookie_duration*86400));// (d*24h*60m*60s)
            setcookie($this->prefix."pass", $this->pass, time()+($this->cookie_duration*86400));// (d*24h*60m*60s)
        }

        //set session
        $_SESSION[$this->prefix.'user'] = $this->user;
        $_SESSION[$this->prefix.'pass'] = $this->pass;
    }

    //if forced log in
    elseif(isset($_GET['action']) && $_GET['action'] == "prompt"){
        session_unset();
        session_destroy();
        //destroy any existing cookie by setting time in past
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));

        $this->prompt();
    }

    //if clearing the login
    elseif(isset($_GET['action']) && $_GET['action'] == "clear_login"){
        session_unset();
        session_destroy();
        //destroy any existing cookie by setting time in past
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));

        $msg = '<h2 class="msg">**Logout complete**</h2>';
        $this->prompt($msg);
    }

    //prompt for
    elseif(!isset($_SESSION[$this->prefix.'pass']) || !isset($_SESSION[$this->prefix.'user'])){
        $this->prompt();
    }

    //check the pw
    else{
        $this->user = $_SESSION[$this->prefix.'user'];
        $this->pass = $_SESSION[$this->prefix.'pass'];
        $this->check();//dies if incorrect
    }

}#-#authorize()


#-#############################################
# desc: compares the user info
# returns: nothing, but will print login prompt and die if incorrect
function check(){

    if(md5($this->prefix . LOGIN_PASS) != $this->pass || LOGIN_USER != $this->user){
        //destroy any existing cookie by setting time in past
        if(!empty($_COOKIE[$this->prefix.'user'])) setcookie($this->prefix."user", "blanked", time()-(3600*25));
        if(!empty($_COOKIE[$this->prefix.'pass'])) setcookie($this->prefix."pass", "blanked", time()-(3600*25));
        session_unset();
        session_destroy();

        $msg='<h2 class="warn">Incorrect username or password</h2>';
        $this->prompt($msg);
    }
}#-#check()


#-#############################################
# desc: prompt to enter password
# param: any custom message to display
# returns: nothing, but exits at end
function prompt($msg=''){
?>
<html><head>
<title>Administrator Login</title>
    <style type="text/css">
    body{margin:15px;}
    
    .msg{font:bold 120% verdana;text-align:center;color:black;}
    .warn{font:bold 120% verdana;text-align:center;color:black;}
    </style>
	
	<script type="text/javascript">
function isValid()
{
if((document.getElementById('user').value)==''&&(document.getElementById('pass').value==''))
{alert('Enter ID No. and Password');
document.getElementById('user').focus();
return false;
}

if(document.getElementById('user').value=='')
{alert('Enter ID No.');
document.getElementById('user').focus();
return false;
}

if(document.getElementById('pass').value=='')
{alert('Enter password');
document.getElementById('pass').focus();
return false;
}

else return true;
}


</script>
</head>
<body bgcolor="#E8E8F4">
<br/><br/><br/>
<table border="2px" align="center" cellspacing="0" cellpadding="0" bgcolor="white">
	<tr><td colspan="2" bgcolor="#000046"><br/></td></tr>
	<tr align="center">
	<td align="center"><img src="login.jpg" align="center"/></td>
	<td align="center"><h1>Administrator Login</h1></td>
	</tr>
	<tr><td colspan="2" bgcolor="#000046"><br/></td></tr>
<tr><td bgcolor="white" colspan="2">
    <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" onsubmit="return isValid();">
	<input type="hidden" name="action" value="set_login">

	<?php echo ("<br/>"); echo $msg; ?>

	<table align="center" width="300" class="login">
	<tr>
		<td class="desc"><label for="user">Admin ID:</label> <input type="text" name="user" id="user"></br></td>
		</tr>
		<tr>
		<td class="desc"><label for="pass">Password:</label> <input type="password" name="pass" id="pass"></br></td>
	</tr>

	

	<tr><td class="desc"style="text-align:center;"></br><input type="submit" value="Login"></td></tr>

	</table>

	</form>
</td>
</tr>
<tr><td  colspan="2" bgcolor="#000046"><br/></td></tr>
</table>
</body></html>
<?php
    //don't run the rest of the page
    exit;
}#-#prompt()


}//CLASS Login

?> 