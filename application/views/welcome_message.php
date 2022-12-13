<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter 3.1.13 modern setup</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/dist/style.css'); ?>">
</head>
<body>

<div class="container mx-auto shadow-md p-3 mt-3">
	<h1 class="font-bold mt-3">Welcome to CodeIgniter 3.1.13 modern setup!</h1>

	<div class="bg-slate-200 py-1 px-3 shadow-md mx-auto mt-10">
        <h3 class="mb-3">Extend library</h3>
        <ul class="flex gap-1 flex-col">
            <li>1.Command line</li>
            <li>2.Tailwind</li>
            <li>3.Datatables</li>
            <li>4.Ion Auth</li>
        </ul>
    </div>

	<p class="absolute bottom-0 pb-10">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>
