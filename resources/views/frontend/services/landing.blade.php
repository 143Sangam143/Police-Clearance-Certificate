@if(\Route::current()->getName() == 'services')
    <div class="min-h-screen bg-black">
        <div id="default-carousel" class="relative w-full h-[90vh] sm:h-screen py-[9rem] min-[250px]:py-[8rem] min-[350px]:py-[5.5rem] px-[1rem] md:px-[5rem] sm:py-[5.5rem]" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg h-full md:h-full">
                <!-- Item 1 -->
                @foreach($services as $service)
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="!bg-local !bg-no-repeat !bg-center !bg-contain w-full h-full grid grid-row" style="background-image:url('/images/backend/services/category/{{ $service->image }}');">
                            <img src="/images/backend/services/category/{{ $service->image }}" class="absolute block sm:hidden w-full h-full sm:object-cover -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                            <h1 class="max-sm:absolute max-sm:top-0 max-sm:bg-gradient-to-r max-sm:from-[#f9f9f9] max-sm:via-[#ececec] max-sm:to-[#f8f8f8] text-[.8rem] sm:text-[1rem] lg:text-[1.2rem] font-bold w-full text-center text-black self-center sm:text-white font-mono capitalize">{{$service->category}}</h1>
                            <p class="max-sm:absolute max-sm:bottom-0 max-sm:bg-gradient-to-r max-sm:from-[#f9f9f9] max-sm:via-[#ececec] max-sm:to-[#f8f8f8] text-[.7rem] sm:text-[.9rem] lg:text-[1.1rem] font-semibold w-full text-center text-black sm:text-white font-mono first-letter:capitalize">{{$service->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif