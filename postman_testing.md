# Postman Testing Steps for Stripe Integration

## Prerequisites
- Laravel Server running (`php artisan serve`)
- Stripe Keys in `.env`
- User registered and logged in (to get Token)

## 1. Login to get Token
**Endpoint:** `POST /api/login`
**Body:**
```json
{
    "email": "user@example.com",
    "password": "password"
}
```
**Response:** Copy the `token`.

## 2. Create Payment Intent (Get Client Secret)
**Endpoint:** `POST /api/checkout/payment-intent`
**Headers:**
`Authorization: Bearer <YOUR_TOKEN>`
**Body:**
```json
{
    "amount": 5000, 
    "currency": "usd"
}
```
**Response:**
```json
{
    "clientSecret": "pi_3Qs..._secret_...",
    "paymentIntentId": "pi_3Qs..."
}
```
Copy `paymentIntentId`.

## 3. Confirm Payment (Client-Side Simulation)
*Normally done by Flutter/Web Client using Stripe SDK + clientSecret.*
For testing backend verification only, you can assume success if you use Test Card `4242...` in a client, OR manually cancel/confirm in Stripe Dashboard.
*Note: The API endpoint checks for `succeeded` status. If you just created it, it's `requires_payment_method`. You cannot "confirm" via API easily without a payment method ID. For backend integration testing, use a real client or Stripe CLI.*

## 4. Create Order (After Payment Success)
**Endpoint:** `POST /api/orders`
**Headers:**
`Authorization: Bearer <YOUR_TOKEN>`
**Body:**
```json
{
    "payment_intent_id": "pi_3Qs...(from step 2)",
    "items": [
        {
            "product_id": 1,
            "quantity": 2,
            "price": 1250
        }
    ]
}
```
**Expected Response:** provided payment is `succeeded`.
```json
{
    "message": "Order created successfully",
    "order_id": 15
}
```
*If PaymentIntent is not `succeeded`, it returns 400 Error.*

## 5. List Orders
**Endpoint:** `GET /api/orders`
**Headers:**
`Authorization: Bearer <YOUR_TOKEN>`
