<?php
	session_start ();
	$pageTitle = "Media vault policies";
	//Javascript function for this page to be passed to header
	$scriptLibCSS = "";
	include "../includes/database.php";
	include "../includes/header.php";
?>

		</table>
		
	</nav>
	

	<div id="maincontent4">
		<h1>Privacy Policy</h1>
		<p>The following privacy policy outlines the privacy policy which will be adhered to by Jub Jub Club. It details the way information will be collected, stored and used in accordance with privacy laws as per Privacy Act 1988 (Which can be found <a class="bluelink" href="http://www.comlaw.gov.au/Details/C2012C00271)">here</a>.</p>
		
		<p>Henceforth the user will be referred to as “You” and Jub Jub Club may be referred to as “Us”, “Our” or “We”.</p>
		
		<p>At Jub Jub Club, we only gather the bare minimum amount of information required in order for you to interact with the site and we will only ever use your information for the purpose you provided it. All information you have provided to us will be able to be viewed, updated or deleted by yourself at any chosen time via your user account page.</p>
		
		<p>You can rest assured that your personal information will never be rented, sold, or otherwise shared with any third party. Of course, this excludes the sharing of your shipping address with one of our shipping providers, in order to ship you your purchases. This exception is completely normal and necessary for any transaction to take place on any website where a physical product is being sold.</p>
		
		<p> Your payment information will not be collected by Jub Jub Club, as all payments will be processed through Paypal, whose privacy policy is available <a class="bluelink" href="https://www.paypal.com/au/webapps/mpp/ua/privacy-full">here</a>.</p>
		
		<p>Any stored information is kept on a secure database and will only be accessed if required by an authorised Jub Jub Club employee or administrator of the database.</p>
		
		<p>We will never send you any “spam” mail, newsletter, update or anything of the sort unless you have expressed consent to receive it. Jub Jub Club also won’t store any cookies on your device and any session which is active when using our website will be destroyed once you log out.</p>
		
		<h1>Security Policy</h1>
		<p>To keep site database information as secure as possible, the following security policy was created.</p>
		
		<p>Users, staff and admin will all require to set up an appropriate account in order to interact with the site. The definition of requirements for an appropriate account is as follows:</p>
		<ul>
			<li>A chosen username with a minimum of 6 characters</li>
			<li>A password with a minimum of 8 characters</li>
			<li>A current email address</li>
		</ul>
		
		<p>Any further required information will be requested if needed. Jub Jub Club will not contact you asking for your password at any point.</p>
		
		<p>All account information will be stored in the Jub Jub Club database. All fields will be prevented from SQL injection, limiting the chance of any person tampering with information collected. All passwords will be hashed before being stored, heightening the difficulty with which a person can decipher it if somehow they did retrieve it. No other user will have access to any other user’s information, apart from their username and comments should they choose to make any. Account hierarchy and access level is detailed below:</p>
		
		<table class="policy">
			<tr>
				<th class="policy1 bluehead">Level of access</th>
				<th class="policy1 bluehead">User</th>
				<th class="policy1 bluehead">Staff</th>
				<th class="policy1 bluehead">Admin</th>
			</tr>
			<tr>
				<td class="policy1">Create new user</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Access user details</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Alter user details</td>
				<td class="policy1">X</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Make comments</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Create/Alter blogs</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Add/remove products</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Remove information from database</td>
				<td class="policy1">-</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Add/delete db table</td>
				<td class="policy1">-</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
			</tr>
			<tr>
				<td class="policy1">Create new staff or admin account</td>
				<td class="policy1">-</td>
				<td class="policy1">-</td>
				<td class="policy1">X</td>
			</tr>
		</table>
		
		<p>All payments will be processed through Paypal, a secure payment processing site, and as such, we will not keep any payment information stored on the database.</p>
		
		<p>The database is stored on a secured server and only able to be accessed by the database administrator. The database administrator will also make secure backups of the database on a daily and weekly basis to ensure it is protected from a large amount of downtime. The backups will also be stored on a secure server which will only be accessible by the administrator.</p>
	</div>
</div>

<?php
	include "../includes/footer.php";
?>