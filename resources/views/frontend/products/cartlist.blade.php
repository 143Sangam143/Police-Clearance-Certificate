<div class="min-h-screen bg-[#9095a0] px-[2rem] xs:px-[5rem] sm:px-[8rem] xl:px-[16.5rem] py-[7rem] !bg-fixed !bg-no-repeat !bg-center !bg-cover" style="background-image: url('/frontend/images/default-bg.png')">
    <div class="bg-white max-2xs:px-[1rem] px-[3rem] xs:pl-[3rem] sm:pl-[5.5rem] xs:pr-[3rem] sm:pr-[4.5rem] py-[2rem] space-y-[2.6rem] shadow-[0px_0px_20px_5px_rgba(0,0,0,0.35)_inset]">
        <h1 class="max-2xs:text-[.9rem] text-[1.1rem] sm:text-[1.5rem] lg:text-[2rem] font-bold">Shopping Cart</h1>
        <div class="space-y-[1.55rem]">
            <hr class="h-[1rem]">
            @if($carts)
                <div class="space-y-[1.54rem]">
                    <div class="space-y-[1.55rem]">
                        @php
                            $quantity = 1;
                            $subtotal=0;
                            $shipping = 30;
                            $taxrate = 0.05;
                            $taxamount = 0;
                            $total = 0;
                        @endphp
                        @foreach($carts as $cart)
                            @php ($quantity = 1)
                            <div class="space-y-[2.5rem]">
                                <div class="grid grid-cols-1 lg:grid-cols-5 2xl:grid-cols-6 gap-[2rem] lg:gap-[5rem]">
                                    <div class="bg-[#f7f7f7] h-[5rem] xs:h-[7rem] sm:h-[8rem] w-[5rem] xs:w-[7rem] sm:w-[8rem] rounded-[.5rem] col-span-1 min-md:mx-auto p-2">
                                        <img src="/images/backend/products/list/{{ $cart->item_image }}" class="h-full rounded-[.5rem] w-fit mx-auto">
                                    </div>
                                    <div class="flex flex-col justify-between lg:col-span-4 2xl:col-span-5">
                                        <div class="grid max-md:grid-cols-1 grid-cols-3 max-md:space-y-[.4rem] justify-between w-full">

                                            <h1 class="text-[.7rem] xs:text-[.9rem] font-semibold text-[#374151]">{{ $cart->item_name }}</h1>
                                            <div class="flex flex-col space-y-[.7rem] md:mx-auto">
                                                <select name="quantity" class="text-[#374151] text-[.7rem] xs:text-[.9rem] font-semibold border-[#d1d5db] rounded-[.4rem] py-[.15rem] xs:py-[.25rem] shadow-sm px-[.55rem] xs:px-[.75rem] mr-[.25rem] w-fit">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                                <a href="{{ route('products.carlist.delete', $cart->id) }}" class="text-[.7rem] xs:text-[.9rem] font-semibold text-[#3574d3] max-lg:hidden">Remove</a>
                                            </div>
                                            <span class="text-[.7rem] xs:text-[.9rem] font-semibold text-[#374151] md:ml-auto">Rs. {{ $cart->price }}/-</span>
                                        </div>
                                        <span class="text-[.7rem] xs:text-[.9rem] text-black font-medium">Avialable</span>
                                        <a href="#" class="text-[.7rem] xs:text-[.9rem] font-semibold text-[#3574d3] lg:hidden">Remove</a>
                                    </div>
                                </div>
                                <hr class="h-[1rem]">
                                @php($subtotal= $subtotal+$cart->price)
                            </div>
                        @endforeach
                    </div>
                    <div class="lg:pl-[9.5rem] space-y-[2.5rem]">
                        <div class="bg-[#f9fafb] max-2xs:px-[.5rem] 2xs:px-[1rem] sm:px-[2rem] py-[1.9rem] rounded-[.5rem] space-y-[.9rem]">
                            <div class="flex justify-between">
                                <h1 class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#4b5563]">Subtotal</h1>
                                <span class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#111827] font-semibold">Rs. {{$subtotal}}/-</span>
                            </div>
                            <hr class="h-[1px]">
                            <div class="flex justify-between">
                                <h1 class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#4b5563]">Shipping</h1>
                                <span class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#111827] font-semibold">Rs. {{$shipping}}/-</span>
                            </div>
                            <hr class="h-[1px]">
                            <div class="flex justify-between">
                                <h1 class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#4b5563]">Tax</h1>
                                @php ($taxamount = $taxrate * $subtotal)
                                <span class="text-[.7rem] 2xs:text-[.65rem] xs:text-[.8rem] sm:text-[.95rem] text-[#111827] font-semibold">Rs. {{$taxamount}}/-</span>
                            </div>
                            <hr class="h-[1px]">
                            <div class="flex justify-between">
                                <h1 class="max-2xs:text-[.8rem] max-xs:text-[.85rem] xs:text-[.9rem] sm:text-[1rem] md:text-[1.2rem] text-[#111827] font-semibold">Total</h1>
                                @php ($total = $subtotal + $shipping + $taxamount)
                                <span class="max-2xs:text-[.8rem] max-xs:text-[.85rem] xs:text-[.9rem] sm:text-[1rem] md:text-[1.2rem] text-[#111827] font-semibold">Rs. {{ $total }}/-</span>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-[.3rem]">
                            <a href="{{ route('products.checkout') }}" class="w-full text-center text-white bg-blue-700 font-semibold hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-[.7rem] xs:text-[.95rem] px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Checkout</a>
                            <p class="text-center text-[#4b5563]">or</p>
                            <a href="{{ url()->previous() }}" class="text-blue-700 max-2xs:text-[.8rem] max-xs:text-[.85rem] xs:text-[.9rem] font-medium text-center w-full">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            @else
                <h1 class="max-2xs:text-[.8rem] text-[.9rem] xs:text-[1.2rem] font-semibold text-[#374151]">No items in cart.</h1>
            @endif
        </div>
    </div>
</div>