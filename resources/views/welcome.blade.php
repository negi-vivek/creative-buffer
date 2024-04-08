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
    <div class="w-fit mx-auto">
        <div class="flex flex-col p-4 sm:p-10 bg-white shadow-md rounded-xl">
            <div class="flex flex-wrap justify-center items-center text-blue-700 pb-6 underlined">Invoice Details</div>
            <div class="flex justify-center items-center">
                <div>
                    <h2 class="text-2xl md:text-3xl font-semibold text-gray-800 underline decoration-dotted">
                        Invoice</h2>
                </div>
            </div>
            <form id="invoiceForm" action="{{ url('/invoice') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                    name="invoice_number"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    type="text" required>
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
                                    name="invoice_date"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    type="date" required>
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
                                    name="due_date"
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    type="date" required>
                            </div>
                        </div>
                        <div id="additional_field_container">

                        </div>
                        <div class="md:flex md:items-center mb-6">
                            <button type="button" onclick="addFields()" class="hover:cursor-pointer">
                            <span class=" text-lg font-semibold text-gray-800 underline decoration-dotted">
                                  <img class="inline-flex"
                                       src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAcElEQVR4nO2WQQqAMAwE51223i3+/wPGf0R66FGIJVKsGdjzQNgmheCP7MAJqFMEKBaxOEpbDotYX8r3xQuQRogbIdYYNZ3lqu19SvIQ5w7xGs+JjlHHAtHRKzPftHfes6jeYhn19SnO8irdLOJgLi7tJqyDbfXOFgAAAABJRU5ErkJggg=="
                                       alt="more fields">
                                Add More Fields
                            </span>
                            </button>
                        </div>
                    </div>

                    <div class="sm:text-end space-y-2">
                            <label class="w-64 flex items-center px-4 py-6 bg-white text-blue rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer hover:bg-blue hover:text-white">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-2 text-base leading-normal"> Add a Business Logo</span>
                                <input type='file' class="hidden" placeholder="Add Business Logo" name="business_logo" id="business_logo"/>
                            </label>
                    </div>
                    <!-- Col -->
                </div>
                <!-- End Grid -->

                <!-- Table -->
                <div class="max-w-5xl mx-auto">
                    <h2 class="text-2xl font-semibold mb-4">Invoice Form</h2>
                    <div class="shadow-md rounded-md p-4">
                        <!-- Heading row -->
                        <div class="grid grid-cols-10 gap-4 mb-4 bg-black p-1 text-white rounded">
                            <div class="col-span-1 font-semibold">Item</div>
                            <div class="col-span-1 font-semibold">GST Rate</div>
                            <div class="col-span-1 font-semibold">Quantity</div>
                            <div class="col-span-1 font-semibold">Rate</div>
                            <div class="col-span-1 font-semibold">Amount</div>
                            <div class="col-span-1 font-semibold">IGST</div>
                            <div class="col-span-1 font-semibold">Total</div>
                            <div class="col-span-1 font-semibold">Description</div>
                            <div class="col-span-1 font-semibold">Thumbnail</div>
                        </div>
                        <!-- Input fields for the first line item -->
                        <div class="line-item-container">
                            <div class="grid grid-cols-10 gap-4 line-item">
                                <input name="item[]" type="text" placeholder="Item" class="col-span-1 p-2 border rounded-md">
                                <input name="gst_rate[]" type="number" placeholder="GST Rate" class="col-span-1 p-2 border rounded-md gst-rate" onchange="calculateAmount(this)">
                                <input name="quantity[]" type="number" placeholder="Quantity" class="col-span-1 p-2 border rounded-md quantity" onchange="calculateAmount(this)">
                                <input name="rate[]" type="number" placeholder="Rate" class="col-span-1 p-2 border rounded-md rate" onchange="calculateAmount(this)">
                                <input name="amount[]" type="number" placeholder="Amount" class="col-span-1 p-2 border rounded-md amount" readonly>
                                <input name="igst[]" type="number" placeholder="IGST" class="col-span-1 p-2 border rounded-md igst" readonly>
                                <input name="total[]" type="number" placeholder="Total" class="col-span-1 p-2 border rounded-md total" readonly>
                                <input name="description[]" type="text" placeholder="Description" class="col-span-1 p-2 border rounded-md">
                                <input name="thumbnail[]" type="file" placeholder="Thumbnail" class="col-span-1 p-2 border rounded-md">
                                <div class="col-span-8 flex justify-between items-center">
                                    <button type="button" class="addLineItemBtn bg-green-500 text-white px-4 py-2 rounded-md">Add New Line Item</button>
                                </div>
                            </div>
                        </div>
                        <!-- Total row -->
                    </div>
                </div>

                <!-- Flex -->
                <div class="mt-8 flex sm:justify-end">
                    <div class="w-full max-w-sm sm:text-end space-y-2">
                        <!-- Grid -->
                        <div class="grid grid-cols-2 sm:grid-cols-1 gap-3 sm:gap-2">
                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">Amount: $</dt>
                                <dd class="col-span-2 text-gray-500">
                                    <input id="totalAmount" type="number" name="total_amount">
                                </dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3">
                                <dt class="col-span-3 font-semibold text-gray-800">IGST: $</dt>
                                <dd class="col-span-2 text-gray-500">
                                    <input id="totalIGST" type="number" name="total_igst" step="0.01">
                                </dd>
                            </dl>

                            <dl class="grid sm:grid-cols-5 gap-x-3 border-y-4 border-black-500">
                                <dt class="col-span-3 font-semibold text-gray-800">Total: $</dt>
                                <dd class="col-span-2 text-gray-500">
                                    <input id="grandTotal" type="number" name="grand_total" step="0.01">
                                </dd>
                            </dl>
                        </div>
                        <!-- End Grid -->
                    </div>
                </div>
                <!-- End Flex -->


                <div class="mt-6 flex justify-end gap-x-3">
                    <button type="submit"
                            class="py-2 px-3 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm">
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                             stroke-linecap="round"
                             stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="7 10 12 15 17 10"/>
                            <line x1="12" x2="12" y1="15" y2="3"/>
                        </svg>
                        Save Invoice
                    </button>
                </div>
            </form>
        </div>
        <!-- End Card -->

        <!-- Buttons -->
        <!-- End Buttons -->
    </div>
</div>
<!-- End Invoice -->
<script src="{{ asset('assets/app.js') }}"></script>
<script>
    function calculateAmount(element) {
        const lineItem = element.closest('.line-item');
        const gstRate = parseFloat(lineItem.querySelector('.gst-rate').value);
        const quantity = parseFloat(lineItem.querySelector('.quantity').value);
        const rate = parseFloat(lineItem.querySelector('.rate').value);
        const amount = quantity * rate;
        const igst = (amount * gstRate) / 100;
        const total = amount + igst;

        lineItem.querySelector('.amount').value = amount.toFixed(2);
        lineItem.querySelector('.igst').value = igst.toFixed(2);
        lineItem.querySelector('.total').value = total.toFixed(2);

        updateTotalAmounts();
    }

    function updateTotalAmounts() {
        let totalAmount = 0;
        let totalIGST = 0;
        let grandTotal = 0;

        document.querySelectorAll('.line-item').forEach(function(lineItem) {
            const amount = parseFloat(lineItem.querySelector('.amount').value);
            const igst = parseFloat(lineItem.querySelector('.igst').value);
            const total = parseFloat(lineItem.querySelector('.total').value);

            totalAmount += amount;
            totalIGST += igst;
            grandTotal += total;
        });

        document.getElementById('totalAmount').value = totalAmount.toFixed(2);
        document.getElementById('totalIGST').value = totalIGST.toFixed(2);
        document.getElementById('grandTotal').value = grandTotal.toFixed(2);
    }

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('addLineItemBtn')) {
            const lineItem = document.querySelector('.line-item').cloneNode(true);
            lineItem.querySelectorAll('input').forEach(function(input) {
                input.value = '';
            });
            document.querySelector('.line-item-container').appendChild(lineItem);
        }
    });

    // Form validation
    const invoiceForm = document.getElementById('invoiceForm');
    invoiceForm.addEventListener('submit', function(event) {
        const inputs = invoiceForm.querySelectorAll('input[required]');
        let isValid = true;

        inputs.forEach(function(input) {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
            } else {
                input.classList.remove('border-red-500');
            }
        });

        if (!isValid) {
            event.preventDefault();
            alert('Please fill in all required fields.');
        }
    });
</script>
</body>
</html>
