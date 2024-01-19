try {
  new DialogListener('signin', 'signinDialog', 'signupDialog').listen()
} catch {}
try {
  new DialogListener('signup', 'signupDialog', 'signinDialog').listen()
} catch {}

new FormListener('signinForm', 'signin.php', 'post').listen()
new FormListener('signupForm', 'signup.php', 'post').listen()
