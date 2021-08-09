const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/html');
  res.end(`<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>TEst 2</title>
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
      <style>
          .hes {
              padding-left: 55px;
              padding-right: 55px;
              padding-bottom: 200px;
          }
          body {
            background-image: url(https://static.vecteezy.com/system/resources/thumbnails/001/968/633/small/abstract-seamless-white-and-grey-square-3d-pattern-background-modern-geometric-texture-design-illustration-vector.jpg);
          }
          
      </style>
  </head>
  <body>
      <!-- Navigation Bar -->
      <header class="text-gray-600 body-font" style="margin-top: 20px;">
          <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
              <img src="logo3.png" alt="">
              <!-- <svg xmlns="" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-green-500 rounded-full" viewBox="0 0 24 24">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg> -->
              <span class="ml-3 text-xl" style="font-size: 35px; font-family: 'Dancing Script', cursive;" >Chalo Bazar</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
              <a href="Test2.html" class="mr-5 hover:text-gray-900">Home</a>
              <a href="#" class="mr-5 hover:text-gray-900">Categories</a>
              <a href="Gallery.html" class="mr-5 hover:text-gray-900">Gallery</a>
              <a href="AboutUs.html" class="mr-5 hover:text-gray-900">About us</a>
              <a href="Contact.html" class="mr-5 hover:text-gray-900">Contact</a>
            </nav>
          </div>
        </header>
        <!-- Main -->
        <section class="text-gray-600 body-font">
          <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                  <p class="mt-1">$16.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Shooting Stars</h2>
                  <p class="mt-1">$21.15</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Neptune</h2>
                  <p class="mt-1">$12.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The 400 Blows</h2>
                  <p class="mt-1">$18.40</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                  <p class="mt-1">$16.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Shooting Stars</h2>
                  <p class="mt-1">$21.15</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Neptune</h2>
                  <p class="mt-1">$12.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The 400 Blows</h2>
                  <p class="mt-1">$18.40</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- 2md -->
        <section class="text-gray-600 body-font" style="margin-top: -75px;">
          <div class="hes">
            <div class="flex flex-wrap -m-4">
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                  <p class="mt-1">$16.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Shooting Stars</h2>
                  <p class="mt-1">$21.15</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Neptune</h2>
                  <p class="mt-1">$12.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The 400 Blows</h2>
                  <p class="mt-1">$18.40</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The Catalyzer</h2>
                  <p class="mt-1">$16.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Shooting Stars</h2>
                  <p class="mt-1">$21.15</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">Neptune</h2>
                  <p class="mt-1">$12.00</p>
                </div>
              </div>
              <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                <a href="Clothes.html" class="block relative h-48 rounded overflow-hidden">
                  <img alt="ecommerce" style="border-radius: 15px;" class="object-cover object-center w-full h-full block" src="https://i0.wp.com/post.healthline.com/wp-content/uploads/2020/07/Best_Baby_Clothes_1296x728.png?w=1155&h=1528">
                </a>
                <div class="mt-4">
                  <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1">CATEGORY</h3>
                  <h2 class="text-gray-900 title-font text-lg font-medium">The 400 Blows</h2>
                  <p class="mt-1">$18.40</p>
                </div>
              </div>
            </div>
          </div>
        </section>
        <hr>      <!-- Footer -->
        <footer class="text-gray-600 body-font">
          <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
            <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900"></a>
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              </svg>
              <span class="ml-3 text-xl" style="font-size: 35px; font-family: 'Dancing Script', cursive;" >Chalo Bazar</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">©     2021 ChaloBazar —
              <a href="https://www.instagram.com/abhinav__nmdo/" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@abhinav__nmdo</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
              <a class="text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                  <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                </svg>
              </a>
              <a class="ml-3 text-gray-500">
                <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                  <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                  <circle cx="4" cy="4" r="2" stroke="none"></circle>
                </svg>
              </a>
            </span>
          </div>
        </footer>
  </body>
  </html>.html`);
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});