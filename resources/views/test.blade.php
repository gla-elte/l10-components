<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blade névtelen komponensek bemutatása Tailwind CSS keretrendszerrel kiegészítve</title>
    @vite('resources/css/app.css')
</head>
<body>
<h1>Class based components</h1>
<div class="m-8">
  <x-alert title="Danger" message="Something not ideal might be happening." type="danger">
    <a href="#" class="text-blue-700 underline">Danger weblink</a>
  </x-alert>
</div>
<div class="m-8">
  <x-alert title="Information" message="Everything is OK." type="success">
    <a href="#" class="text-blue-700 underline">Success weblink</a>
  </x-alert>
</div>
<div class="m-8">
    <x-alert title="Information" message="Everything is OK." type="success">
      <a href="#" class="text-blue-700 underline">Success weblink</a>
    </x-alert>
  </div>
</body>
</html>
