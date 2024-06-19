// server.js
//
// Use this sample code to handle webhook events in your integration.
//
// 1) Paste this code into a new file (server.js)
//
// 2) Install dependencies
//   npm install stripe
//   npm install express
//
// 3) Run the server on http://localhost:4242
//   node server.js

// The library needs to be configured with your account's secret key.
// Ensure the key is kept out of any version control system you might be using.
const stripe = require('stripe')('pk_test_51PEZ5DBuRzcFfsWqKgKhBZlEcufMjMISw1aUXo04GF6BvuARcOH3hn9C33uw19gGmN7fFtw0XakHYb849lzSV4oi00QlgBVwRS');
const express = require('express');
const app = express();


// This is your Stripe CLI webhook secret for testing your endpoint locally.
const endpointSecret = "whsec_c6ec9fdc389fbae465035382024c3200e3458e10cb11ff8ace17e3c29ff67dd1";

app.post('/webhook', express.raw({type: 'application/json'}), (request, response) => {
  const sig = request.headers['stripe-signature'];

  let event;

  try {
    event = stripe.webhooks.constructEvent(request.body, sig, endpointSecret);
  } catch (err) {
    response.status(400).send(`Webhook Error: ${err.message}`);
    return;
  }

  // Handle the event
  switch (event.type) {
    case 'payment_intent.succeeded':
      const paymentIntentSucceeded = event.data.object;
      // Then define and call a function to handle the event payment_intent.succeeded
      break;
    // ... handle other event types
    default:
      console.log(`Unhandled event type ${event.type}`);
  }

  // Return a 200 response to acknowledge receipt of the event
  response.send();
});

app.listen(4242, () => console.log('Running on port 4242'));