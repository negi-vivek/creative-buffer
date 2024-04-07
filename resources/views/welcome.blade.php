<!doctype html>
<html class="dark" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Create Invoice</title>
</head>
<body>
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
    <div class="sm:w-11/12 lg:w-3/4 mx-auto">
        <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl">
            <div class="flex flex-wrap justify-center items-center text-blue-700 pb-6 underlined">Invoice Details</div>
            <div class="flex justify-center items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 underline decoration-dotted">
                        Invoice</h2>
                </div>
            </div>
            <form action="">
                <div class="mt-8 grid sm:grid-cols-2 gap-3">
                    <div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="text-lg font-semibold text-gray-800 underline decoration-dotted">
                                    Invoice No*
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" value="Jane Doe">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="text-lg font-semibold text-gray-800 underline decoration-dotted">
                                    Invoice Date*
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" value="Jane Doe">
                            </div>
                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="text-lg font-semibold text-gray-800 underline decoration-dotted">
                                    Due Date*
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" value="Jane Doe">
                            </div>
                        </div>
                        <diav class="md:flex md:items-center mb-6">
                            <a class="hover:cursor-pointer">
                            <span class=" text-lg font-semibold text-gray-800 underline decoration-dotted">
                                  <img class="inline-flex"
                                       src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAcElEQVR4nO2WQQqAMAwE51223i3+/wPGf0R66FGIJVKsGdjzQNgmheCP7MAJqFMEKBaxOEpbDotYX8r3xQuQRogbIdYYNZ3lqu19SvIQ5w7xGs+JjlHHAtHRKzPftHfes6jeYhn19SnO8irdLOJgLi7tJqyDbfXOFgAAAABJRU5ErkJggg=="
                                       alt="more fields">
                                Add More Fields
                            </span>
                            </a>
                        </diav>
                    </div>

                    <div class="sm:text-end space-y-2">
                        <input type="file" placeholder="Add Business Logo" name="business_logo" id="business_logo">
                    </div>
                    <!-- Col -->
                </div>
                <!-- End Grid -->

                <!-- Table -->
                <div class="mt-6">
                    <div class="border border-gray-200 p-4 rounded-lg space-y-4">
                        <div class="hidden sm:grid sm:grid-cols-5">
                            <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase">Item</div>
                            <div class="text-start text-xs font-medium text-gray-500 uppercase">Qty</div>
                            <div class="text-start text-xs font-medium text-gray-500 uppercase">Rate</div>
                            <div class="text-end text-xs font-medium text-gray-500 uppercase">Amount</div>
                        </div>

                        <div class="hidden sm:block border-b border-gray-200"></div>

                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                            <div class="col-span-full sm:col-span-2">
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                                <p class="font-medium text-gray-800">Design UX and UI</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                                <p class="text-gray-800">1</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                                <p class="text-gray-800">5</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                <p class="sm:text-end text-gray-800">$500</p>
                            </div>
                        </div>

                        <div class="sm:hidden border-b border-gray-200"></div>

                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                            <div class="col-span-full sm:col-span-2">
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                                <p class="font-medium text-gray-800">Web project</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                                <p class="text-gray-800">1</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                                <p class="text-gray-800">24</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                <p class="sm:text-end text-gray-800">$1250</p>
                            </div>
                        </div>

                        <div class="sm:hidden border-b border-gray-200"></div>

                        <div class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                            <div class="col-span-full sm:col-span-2">
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Item</h5>
                                <p class="font-medium text-gray-800">SEO</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Qty</h5>
                                <p class="text-gray-800">1</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Rate</h5>
                                <p class="text-gray-800">6</p>
                            </div>
                            <div>
                                <h5 class="sm:hidden text-xs font-medium text-gray-500 uppercase">Amount</h5>
                                <p class="sm:text-end text-gray-800">$2000</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Table -->

                <!-- Flex -->
                <div class="mt-8 flex sm:justify-end">
                    <div class="w-full max-w-2xl sm:text-end space-y-2">
                        <!-- Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Subtotal:</dt>
                                <dd class="col-span-2 text-gray-500">$2750.00</dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Total:</dt>
                                <dd class="col-span-2 text-gray-500">$2750.00</dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Tax:</dt>
                                <dd class="col-span-2 text-gray-500">$39.00</dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Amount paid:</dt>
                                <dd class="col-span-2 text-gray-500">$2789.00</dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Due balance:</dt>
                                <dd class="col-span-2 text-gray-500">$0.00</dd>
                            </dl>
                        </div>
                        <!-- End Grid -->
                    </div>
                </div>
                <!-- End Flex -->

                <div class="mt-8 sm:mt-12">
                    <h4 class="text-lg font-semibold text-gray-800">Thank you!</h4>
                    <p class="text-gray-500">If you have any questions concerning this invoice, use the following
                        contact
                        information:</p>
                    <div class="mt-2">
                        <p class="block text-sm font-medium text-gray-800">example@site.com</p>
                        <p class="block text-sm font-medium text-gray-800">+1 (062) 109-9222</p>
                    </div>
                </div>

                <p class="mt-5 text-sm text-gray-500">© 2022 Preline.</p>
            </form>
        </div>
        <!-- End Card -->

        <!-- Buttons -->
        <div class="mt-6 flex justify-end gap-x-3">
            <a class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm"
               href="#">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                    <polyline points="7 10 12 15 17 10"/>
                    <line x1="12" x2="12" y1="15" y2="3"/>
                </svg>
                Invoice PDF
            </a>
            <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
               href="#">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                     viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9"/>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                    <rect width="12" height="8" x="6" y="14"/>
                </svg>
                Print
            </a>
        </div>
        <!-- End Buttons -->
    </div>
</div>
<!-- End Invoice -->
</body>
</html>
