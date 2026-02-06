<x-app-layout>
    <div class="py-12 bg-gray-50 min-h-screen font-serif">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-display text-gray-900 mb-8 text-center"
                style="font-family: 'Cormorant Garamond', serif;">Secure Payment</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Order Summary -->
                <div class="md:col-span-1 bg-white p-6 rounded-lg shadow-sm h-fit">
                    <h3 class="text-lg font-medium text-gray-900 mb-4"
                        style="font-family: 'Cormorant Garamond', serif;">Order Summary</h3>
                    <div class="flow-root">
                        <ul role="list" class="-my-4 divide-y divide-gray-200">
                            @foreach($cart as $id => $details)
                                <li class="flex py-4">
                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                        <img src="{{ $details['image_url'] ?? 'https://placehold.co/100' }}"
                                            alt="{{ $details['name'] }}" class="h-full w-full object-cover object-center">
                                    </div>
                                    <div class="ml-4 flex flex-1 flex-col">
                                        <div>
                                            <div class="flex justify-between text-base font-medium text-gray-900">
                                                <h3 style="font-family: 'Cormorant Garamond', serif;">{{ $details['name'] }}
                                                </h3>
                                                <p class="ml-4">LKR {{ number_format($details['price']) }}</p>
                                            </div>
                                            <p class="mt-1 text-sm text-gray-500">Qty {{ $details['quantity'] }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="border-t border-gray-200 mt-6 pt-4 space-y-2">
                        <div class="flex justify-between text-sm text-gray-600">
                            <p>Subtotal</p>
                            <p>LKR {{ number_format($subtotal) }}</p>
                        </div>
                        <div class="flex justify-between text-sm text-gray-600">
                            <p>Delivery</p>
                            <p>LKR {{ number_format($delivery) }}</p>
                        </div>
                        <div
                            class="flex justify-between text-base font-medium text-gray-900 pt-2 border-t border-gray-200">
                            <p style="font-family: 'Cormorant Garamond', serif;">Total</p>
                            <p>LKR {{ number_format($total) }}</p>
                        </div>
                    </div>
                </div>

                <!-- Stripe Payment Element -->
                <div class="md:col-span-2 bg-white p-6 rounded-lg shadow-sm">
                    <form id="payment-form">
                        <div id="payment-element">
                            <!--Stripe.js injects the Payment Element-->
                        </div>
                        <button id="submit"
                            class="mt-8 w-full bg-black text-white px-6 py-3 rounded-none uppercase tracking-wider hover:bg-gray-800 transition duration-300"
                            style="font-family: 'Cormorant Garamond', serif;">
                            <div class="spinner hidden" id="spinner"></div>
                            <span id="button-text">Pay now</span>
                        </button>
                        <div id="payment-message" class="hidden mt-4 text-center text-red-500"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const clientSecret = "{{ $clientSecret }}";

        const appearance = {
            theme: 'stripe',
            variables: {
                colorPrimary: '#000000',
                fontFamily: '"Cormorant Garamond", serif',
            },
        };
        const elements = stripe.elements({ appearance, clientSecret });

        const paymentElementOptions = {
            layout: "tabs",
        };

        const paymentElement = elements.create("payment", paymentElementOptions);
        paymentElement.mount("#payment-element");

        const form = document.getElementById("payment-form");

        form.addEventListener("submit", async (e) => {
            e.preventDefault();
            setLoading(true);

            const { error } = await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: "{{ route('checkout.success') }}",
                },
            });

            if (error) {
                if (error.type === "card_error" || error.type === "validation_error") {
                    showMessage(error.message);
                } else {
                    showMessage("An unexpected error occurred.");
                }
            }

            setLoading(false);
        });

        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");
            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;
            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageContainer.textContent = "";
            }, 4000);
        }

        function setLoading(isLoading) {
            if (isLoading) {
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }
    </script>
</x-app-layout>