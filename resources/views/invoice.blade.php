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
                                value="{{ $invoice->invoice_number }}"
                                name="invoice_number"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                type="text"
                                required
                                readonly>
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
                                value="{{ $invoice->invoice_date }}"
                                name="invoice_date"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                type="date"
                                required
                                readonly
                            >
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
                                value="{{ $invoice->due_date }}"
                                name="due_date"
                                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                type="date"
                                required
                                readonly
                            >
                        </div>
                    </div>
                    <div id="additional_field_container">
                        @if($invoice->invoice_fields)
                            @foreach($invoice->invoice_fields as $invoiceFields)
                                <div class="flex">
                                    <input type="text"
                                           class="mx-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                           name="fieldName[]"
                                           placeholder="Field Name"
                                           required
                                           value="{{ $invoiceFields->field_name }}"
                                    >
                                    <input type="text"
                                           class="mx-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                           name="fieldValue[]"
                                           placeholder="Value"
                                           value="{{ $invoiceFields->field_value }}"
                                           required
                                    >
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                @if($invoice->business_logo_path)
                    <div class="sm:text-end space-y-2 flex justify-center items-center">
                        <img src="{{ $invoice->business_logo_path }}" width="200" alt="Business Logo" id="business_logo">
                    </div>
                @endif

                <!-- Col -->
            </div>
            <!-- End Grid -->

            <!-- Table -->
            <div class="max-w-4xl mx-auto">
                <h2 class="text-2xl font-semibold mb-4">Invoice</h2>
                <div class="bg-white shadow-md rounded-md p-4">
                    <!-- Heading row -->
                    <div class="grid grid-cols-8 gap-4 mb-4">
                        <div class="col-span-1 font-semibold">Item</div>
                        <div class="col-span-1 font-semibold">GST Rate</div>
                        <div class="col-span-1 font-semibold">Quantity</div>
                        <div class="col-span-1 font-semibold">Rate</div>
                        <div class="col-span-1 font-semibold">Amount</div>
                        <div class="col-span-1 font-semibold">IGST</div>
                        <div class="col-span-1 font-semibold">Total</div>
                        <div class="col-span-2"></div>
                    </div>
                    <!-- Input fields for the first line item -->
                    @if($invoice->line_items)
                        @foreach($invoice->line_items as $lineItems)
                            <div class="line-item-container">
                                <div class="grid grid-cols-8 gap-4 line-item">
                                    <input name="item[]" type="text" placeholder="Item"
                                           class="col-span-1 p-2 border rounded-md"
                                           value="{{$lineItems->item}}"
                                    >
                                    <input name="gst_rate[]" type="number" placeholder="GST Rate"
                                           class="col-span-1 p-2 border rounded-md gst-rate"
                                           onchange="calculateAmount(this)"
                                           value="{{$lineItems->gst_rate}}">
                                    <input name="quantity[]" type="number" placeholder="Quantity"
                                           class="col-span-1 p-2 border rounded-md quantity"
                                           onchange="calculateAmount(this)"
                                           value="{{$lineItems->quantity}}"
                                    >
                                    <input name="rate[]" type="number" placeholder="Rate"
                                           class="col-span-1 p-2 border rounded-md rate"
                                           onchange="calculateAmount(this)"
                                           value="{{$lineItems->rate}}"
                                    >
                                    <input name="amount[]" type="number" placeholder="Amount"
                                           class="col-span-1 p-2 border rounded-md amount" readonly
                                           value="{{$lineItems->amount}}"
                                    >
                                    <input name="igst[]" type="number" placeholder="IGST"
                                           class="col-span-1 p-2 border rounded-md igst" readonly
                                           value="{{$lineItems->igst}}"
                                    >
                                    <input name="total[]" type="number" placeholder="Total"
                                           class="col-span-1 p-2 border rounded-md total" readonly
                                           value="{{$lineItems->total}}"
                                    >
                                    <input name="description[]" type="text" placeholder="Description"
                                           class="col-span-1 p-2 border rounded-md total" readonly
                                           value="{{$lineItems->description}}"
                                    >
                                    @if($lineItems->thumbnail_path)
                                        <div class="flex justify-center items-center">
                                            <img src="{{ $lineItems->thumbnail_path }}" alt="Thumbnail" id="business_logo">
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
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
                                <input id="totalAmount" type="number" name="total_amount" readonly
                                       value="{{ $invoice->amount }}">
                            </dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3">
                            <dt class="col-span-3 font-semibold text-gray-800">IGST: $</dt>
                            <dd class="col-span-2 text-gray-500">
                                <input id="totalIGST" type="number" name="total_igst" step="0.01"
                                       value="{{ $invoice->igst }}"
                                       readonly>

                            </dd>
                        </dl>

                        <dl class="grid sm:grid-cols-5 gap-x-3 border-y-4 border-black-500">
                            <dt class="col-span-3 font-semibold text-gray-800">Total: $</dt>
                            <dd class="col-span-2 text-gray-500">
                                <input id="grandTotal" type="number" name="grand_total" step="0.01"
                                       value="{{ $invoice->total }}"
                                       readonly>
                            </dd>
                        </dl>
                    </div>
                    <!-- End Grid -->
                </div>
            </div>
            <!-- End Flex -->
        </div>
        <!-- End Card -->

        <!-- Buttons -->
        <!-- End Buttons -->
    </div>
</div>
<!-- End Invoice -->
</body>
</html>
