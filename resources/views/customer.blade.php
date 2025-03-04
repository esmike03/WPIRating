<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('images/logowestpoint2.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
        rel="stylesheet">
    <title>Customer - WPI Rating Sheet</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="flex items-center justify-center min-h-screen bg-green-100 font-['Roboto']">
    <div class="max-w-4xl mx-auto bg-gray-100 p-6 rounded-lg shadow-lg">
        <div class="flex flex-col items-center mb-4 w-full">
            <img src="{{ asset('images/wespointv2nb.png') }}" class="h-10 mb-2" />
            <p class="text-center text-[6px] leading-tight">
                WPI Bldg, St. Peter Street, Dona Maria Village 1, <br>
                Punta Princesa, Cebu City, Cebu 6300
            </p>
        </div>

        <h1 class="text-center mb-2">Daily Work With Report</h1>

        <h2 class="text-xs bg-green-200 text-green-700 p-1 rounded-md text-center shadow-md">Note: These will be graded
            from 1 (lowest) to 10 (highest)</h2>
        <form x-data="formHandler()" @submit.prevent="submitForm">
            <div class="mt-4 grid grid-cols-2 gap-4">
                <div><strong class="text-gray-800 text-sm">Date:</strong> <input type="date" x-model="form.date"
                        class="rounded-md border-1 p-1 w-full bg-white shadow-md"
                        :class="errors.date ? 'border-red-400' : 'border-gray-200'" @input="errors.date = false"></div>
                <div><strong class="text-gray-800 text-sm">Customer Code:</strong> <input type="text"
                        x-model="form.customer_code" class="shadow-md border-1 rounded-md  p-1 w-full bg-white"
                        :class="errors.customer_code ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.customer_code = false"></div>
                <div><strong class="text-gray-800 text-sm">Name of Customer:</strong> <input type="text"
                        x-model="form.customer_name" class="rounded-md border-1  shadow-md  p-1 w-full bg-white"
                        :class="errors.customer_name ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.customer_name = false"></div>
                <div><strong class="text-gray-800 text-sm">Address:</strong> <input type="text"
                        x-model="form.address" class="rounded-md border-1  shadow-md  p-1 w-full bg-white"
                        :class="errors.address ? 'border-red-400' : 'border-gray-200'" @input="errors.address = false">
                </div>

            </div>

            <h3 class="text-xl font-medium mt-6 pb-1">Customers</h3>

            <div class="mt-4 bg-white p-3 rounded-md shadow-md"> <!--x-data="{ scores: {} }"-->
                <h4 class="font-semibold">a. Personal Relation</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'To Customers',
                'To Agent and Partner',
                'Loyalty to the Company',
                'To the Manager of the Company',
                'To the Supervisor',
                'To the Office Feedback',
                'Loyalty to the Company',
            ]"
                    :key="index">
                    <div class="mt-3">
                        <span x-text="question" class="ml-8"
                            :class="errors.personalrelation[index] ? 'text-red-500' : ''"></span>
                        <div class="flex space-x-2 ml-8">
                            <template x-for="n in 10">
                                <label>
                                    <input type="radio" :name="'personalrelation-' + index" :value="n"
                                        x-model="form.personalrelation[index]"
                                        @change="errors.personalrelation[index] = false">
                                    <span x-text="n" class="text-sm sm:text-lg text-gray-800"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-4 bg-white p-3 rounded-md shadow-md" x-data="{ scores: {} }">
                <h4 class="font-semibold">b. Sales and Collection</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'Ordering Concerns',
                'Terms Concerns',
                'Deal Concerns',
                'Discounting Concerns',
                'Collection Concerns',
            ]"
                    :key="index">
                    <div class="mt-3">
                        <span x-text="question" class="ml-8"
                            :class="errors.sales[index] ? 'text-red-500' : ''"></span>
                        <div class="flex space-x-2 ml-8">
                            <template x-for="n in 10">
                                <label>
                                    <input type="radio" :name="'sales-' + index" :value="n"
                                        x-model="form.sales[index]" @change="errors.sales[index] = false">
                                    <span x-text="n" class="text-sm sm:text-lg text-gray-800"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </template>
            </div>
            <div class="mt-3" >
                <strong class="mt-3 text-gray-800">Comments and Remarks:</strong>
                <textarea x-model="form.comments" class=" p-1 mt-0 w-full bg-white rounded-md my-4 shadow-md"></textarea>
            </div>

            <div class="mt-6 text-center w-full flex gap-4">
                <button onclick="window.location.href='{{ route('welcome.index') }}'"
                    class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">back</button>
                <button type="submit"
                    class="px-4 py-2 bg-green-500 text-white rounded-lg hover:bg-green-600 w-full">Submit</button>
            </div>
        </form>
    </div>

    <script>
        function formHandler() {
            return {
                form: {
                    date: '',
                    customer_code: '',
                    customer_name: '',
                    address: '',
                    personalrelation: {},
                    sales: {},
                    comments: '',
                },
                errors: {
                    date: false,
                    customer_code: false,
                    customer_name: false,
                    address: false,
                    personalrelation: {},
                    sales: {},
                },
                questions: {
                    personalrelation: [
                        'To Customers',
                        'To Agent and Partner',
                        'Loyalty to the Company',
                        'To the Manager of the Company',
                        'To the Supervisor',
                        'To the Office Feedback',
                    ],
                    sales: ['Ordering Concerns', 'Terms Concerns', 'Deal Concerns', 'Discounting Concerns',
                        'Collection Concerns',
                    ],
                },

                validateForm() {
                    let isValid = true;

                    // Reset errors
                    this.errors = {
                        date: false,
                        customer_code: false,
                        customer_name: false,
                        address: false,
                        personalrelation: {},
                        sales: {},
                    };

                    // Validate text fields
                    for (let key of ['date', 'customer_code', 'customer_name', 'address']) {
                        if (!this.form[key]) {
                            this.errors[key] = true;
                            isValid = false;
                        }
                    }

                    // Validate radio button answers
                    for (let category in this.questions) {
                        for (let i = 0; i < this.questions[category].length; i++) {
                            if (!this.form[category][i]) {
                                this.errors[category][i] = true; // Mark question as missing
                                isValid = false;
                            }
                        }
                    }

                    return isValid;
                },

                async submitForm() {
                    if (!this.validateForm()) {
                        Swal.fire({
                            title: "Incomplete Form",
                            text: "Please fill in all required fields before submitting.",
                            icon: "warning",
                            confirmButtonColor: "#f39c12",
                        });
                        return;
                    }



                    try {
                        let response = await fetch("{{ route('form2.submit') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(this.form)
                        });

                        let result = await response.json();

                        if (result.success) {
                            Swal.fire({
                                title: "Success!",
                                text: "Form submitted successfully!",
                                icon: "success",
                                confirmButtonColor: "#28a745",
                            }).then(() => {
                                window.location.href = "{{ route('welcome.index') }}";
                            });
                        } else {
                            Swal.fire({
                                title: "Error!",
                                text: "Submission failed!",
                                icon: "error",
                                confirmButtonColor: "#dc3545",
                            });
                        }
                    } catch (error) {
                        console.error("Error submitting form:", error);
                        Swal.fire({
                            title: "Error!",
                            text: "Something went wrong!",
                            icon: "error",
                            confirmButtonColor: "#dc3545",
                        });
                    }
                }
            };
        }
    </script>

</body>

</html>
