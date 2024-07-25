document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    
    fetch('auth.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username, password })
    })
    .then(response => response.json())
    .then(data => {
        if (data.token) {
            localStorage.setItem('jwt', data.token);
            alert('Login successful');
        } else {
            alert('Login failed: ' + data.error);
        }
    });
    });
    
    document.getElementById('get-resource').addEventListener('click', function() {
    const token = localStorage.getItem('jwt');
    
    fetch('protected.php', {
        method: 'GET',
        headers: {
            'Authorization': 'Bearer ' + token
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('result').innerText = JSON.stringify(data, null, 2);
    });
});