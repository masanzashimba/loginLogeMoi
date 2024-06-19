<!DOCTYPE html>
<html>
<head>
  <title>Thanks for your order!</title>
  <!-- Include Tailwind CSS -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
 
</head>
<body class="flex items-center justify-center bg-gray-900 min-h-screen text-white font-sans">
  <section class="bg-white w-96 h-28 rounded-lg flex flex-col justify-between p-5">
    <div class="flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14px" height="16px" viewBox="0 0 14 16" version="1.1">
          <defs/>
          <g id="Flow" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="0-Default" transform="translate(-121.000000, -40.000000)" fill="#E184DF">
                  <path d="M127,50 L126,50 C123.238576,50 121,47.7614237 121,45 C121,42.2385763 123.238576,40 126,40 L135,40 L135,56 L133,56 L133,42 L129,42 L129,56 L127,56 L127,50 Z M127,48 L127,42 L126,42 C124.343146,42 123,43.3431458 123,45 C123,46.6568542 124.343146,48 126,48 L127,48 Z" id="Pilcrow"/>
              </g>
          </g>
      </svg>
      <div class="mt-2">
        <h3 class="text-base leading-5 tracking-tighter">Subscription to Starter plan successful!</h3>
      </div>
    </div>
    <form action="{{ route('manage.billing') }}" method="POST" class="mt-4">
    <input type="hidden" id="session-id" name="session_id" value="" />
    <button id="checkout-and-portal-button" type="submit" class="w-full py-1 px-4 mt-4 bg-purple-600 text-white rounded-b-lg shadow-md hover:bg-opacity-80">Manage your billing information</button>
</form>

  </section>
  <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
