<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Job Search</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
@yield('content')
    
</body>
</html>

<script>
   function validateJobTitle() {
    const jobTitleInput = document.getElementById('title');
    const messageSpan = document.getElementById('jobMessage');
    const jobTitleValue = jobTitleInput.value;
    
    // Define the regular expression for valid job titles
    const jobTitlePattern = /^[a-zA-Z\s.,-]{3,50}$/;

    if (jobTitleValue === '') {
        messageSpan.textContent = '';
        messageSpan.className = 'error';
    } else if (!jobTitlePattern.test(jobTitleValue)) {
        messageSpan.textContent = 'Job title must be 3-50 characters long and can include letters, spaces, and basic punctuation.';
        messageSpan.className = 'error';
    } else {
        messageSpan.textContent = '';
        messageSpan.className = 'success';
    }
}

function validatelocation() {
    const jobTitleInput = document.getElementById('location');
    const messageSpan = document.getElementById('locationMessage');
    const jobTitleValue = jobTitleInput.value;
    
    // Define the regular expression for valid job titles
    const jobTitlePattern = /^[a-zA-Z\s.,-]{3,50}$/;

    if (jobTitleValue === '') {
        messageSpan.textContent = '';
        messageSpan.className = 'error';
    } else if (!jobTitlePattern.test(jobTitleValue)) {
        messageSpan.textContent = 'Location must be 3-50 characters long and can include letters, spaces, and basic punctuation.';
        messageSpan.className = 'error';
    } else {
        messageSpan.textContent = '';
        messageSpan.className = 'success';
    }
}
</script>