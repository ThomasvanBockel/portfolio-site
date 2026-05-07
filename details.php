<?php
$id = $_GET['id'];
$json = file_get_contents('./projects.json');
$data = json_decode($json);
$length = count($data->projects);
if ($id >= $length) {
    header("Location: index.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Details</title>
    <link rel="stylesheet" href="./dist/output.css">

</head>
<body>


<nav class="bg-gray-900 lg:min-h-14 min-h-52 flex items-center  pl-5 sticky - top-0 z-50 ">
    <div class="lg:pl-36 pl-16">
        <a href="./index.html" class="  border-white ">
            <img src="./img/logo.png" alt="logo" class="max-h-16 max-w-full object-contain">
        </a>
    </div>
    <div class=" ml-auto flex gap-6 pr-5 ">
        <a href="./index.html" class="  bg-gray-700 px-16 py-4 lg:px-4 lg:py-0">Portfolio</a>

    </div>

</nav>

<header class="bg-gray-800 lg:p-10 p-32  ">
    <h1 class="text-white text-8xl justify-center lg:text-6xl w-3/4 flex justify-self-center ">
        <?php echo $data->projects[$id]->name; ?>
    </h1>
</header>
<main>

    <div class="w-2/3 flex justify-self-center  border-2 border-black rounded-md mt-5">
        <p class=" lg:text-xl text-4xl ">
            <?php echo $data->projects[$id]->description; ?>
        </p>
    </div>

    <div class="w-1/2 flex justify-self-center mt-5">
        <img src="<?php echo $data->projects[$id]->images->header->src; ?>"
             alt="<?php echo $data->projects[$id]->images->header->alt ?>">
    </div>


    <div class="w-2/3 flex justify-self-center  border-2 border-black rounded-md my-5">
        <p class=" lg:text-xl text-4xl">
            <?php echo $data->projects[$id]->contribution; ?>
        </p>
    </div>
</main>
<footer class="bg-gray-600 p-10 flex align-middle flex-col pl-36 text-2xl ">
    <p class=" text-gray-200">socials:</p>
    <a href="https://github.com/ThomasvanBockel" class=" text-white text-2xl">Github</a>
    <a href="https://nl.linkedin.com/in/thomas-van-bockel-abb325227" class=" text-white text-2xl">linkedin</a>
</footer>
</body>
</html>
