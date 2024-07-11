<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="http://tramite.ugeltacna.gob.pe/assets/admin/img/favicon.png" />
	<link href="css/colas/styles.css" rel="stylesheet">
	<script src="https://cdn.tailwindcss.com"></script>
	<script>
        tailwind.config = {
            theme: {
                extend: {
                colors: {
                    clifford: '#da373d',
                }
                }
            }
        }
    </script>
	<title>Document</title>
	<script src="js/colas/jquery-3.7.0.min.js"></script> 
</head>
<body>
    @yield('content')
    @yield('scripts')
</body>
</html>