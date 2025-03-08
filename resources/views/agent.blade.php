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
    <title>Agent - WPI Rating Sheet</title>
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
                <div><strong class="text-gray-800 text-sm">Date:</strong> <input type="date"  x-model="form.date"
                        class="rounded-md border-1 shadow-md border-gray-200 p-1 w-full bg-white"
                        :class="errors.date ? 'border-red-400' : 'border-gray-200'" @input="errors.date = false"></div>
                <div><strong class="text-gray-800 text-sm">Area Code:</strong> <input type="text"
                        x-model="form.area_code" class="rounded-md shadow-md border-1 border-gray-200 p-1 w-full bg-white"
                        :class="errors.area_code ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.area_code = false"></div>
                <div><strong class="text-gray-800 text-sm">Name of Agent:</strong> <input type="text"
                        x-model="form.agent_name" class="rounded-md shadow-md border-1 border-gray-200 p-1 w-full bg-white"
                        :class="errors.agent_name ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.agent_name = false"></div>
                <div><strong class="text-gray-800 text-sm">Name of Partner:</strong> <input type="text"
                        x-model="form.partner_name" class="rounded-md shadow-md border-1 border-gray-200 p-1 w-full bg-white"
                        :class="errors.partner_name ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.partner_name = false">
                </div>
                <div><strong class="text-gray-800 text-sm">Name of Supervisor:</strong> <input type="text"
                        x-model="form.supervisor_name" class="rounded-md shadow-md border-1 border-gray-200 p-1 w-full bg-white"
                        :class="errors.supervisor_name ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.supervisor_name = false">
                </div>
                <div><strong class="text-gray-800 text-sm">Name of Manager:</strong> <input type="text"
                        x-model="form.manager_name" class="rounded-md border-1 shadow-md border-gray-200 p-1 w-full bg-white"
                        :class="errors.manager_name ? 'border-red-400' : 'border-gray-200'"
                        @input="errors.manager_name = false">
                </div>
            </div>

            <h3 class="text-xl font-medium mt-6 pb-1">Personnel</h3>

            <div class="mt-4 bg-white p-3 rounded-md shadow-md"> <!--x-data="{ scores: {} }"-->
                <h4 class="font-semibold">a. Personal Relation</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'Spirit of Entrepreneurship',
                'Relationship to Clients',
                'Relationship with Partner',
                'Relationship with Superior'
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
                <h4 class="font-semibold">b. Grooming</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'Dress',
                'Cleanliness',
                'Netness',
                'Odor'
            ]"
                    :key="index">
                    <div class="mt-3">
                        <span x-text="question" class="ml-8"
                        :class="errors.grooming[index] ? 'text-red-500' : ''"></span>
                        <div class="flex space-x-2 ml-8">
                            <template x-for="n in 10">
                                <label>
                                    <input type="radio" :name="'grooming-' + index" :value="n"
                                        x-model="form.grooming[index]"
                                        @change="errors.grooming[index] = false">
                                    <span x-text="n" class="text-sm sm:text-lg text-gray-800"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-4 bg-white p-3 rounded-md shadow-md" x-data="{ scores: {} }">
                <h4 class="font-semibold">c. Stocks and Concerns</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'Product Knowledge',
                'Booking Mastery',
                'Cooperation with Partner',
                'a/r Concerns and Safety',
                'Account Receivable Keeping',
                'Vehicle Maintenance',
                'Vehicle Cleanliness',
                'Vehicle Reporting',
            ]"
                    :key="index">
                    <div class="mt-3">
                        <span x-text="question" class="ml-8"
                        :class="errors.stocks[index] ? 'text-red-500' : ''"></span>
                        <div class="flex space-x-2 ml-8">
                            <template x-for="n in 10">
                                <label>
                                    <input type="radio" :name="'stocks-' + index" :value="n"
                                        x-model="form.stocks[index]"
                                        @change="errors.stocks[index] = false">
                                    <span x-text="n" class="text-sm sm:text-lg text-gray-800"></span>
                                </label>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            <div class="mt-4 bg-white p-3 rounded-md shadow-md" x-data="{ scores: {} }">
                <h4 class="font-semibold">d. Expenses Management</h4>

                <template class="ml-7"
                    x-for="(question, index) in [
                'Meal Subsidy',
                'Customer Snacks',
                'Diesel Consumption',
                'Lodgin Expenses',
                'Office Supplies',
            ]"
                    :key="index">
                    <div class="mt-3">
                        <span x-text="question" class="ml-8"
                        :class="errors.expenses[index] ? 'text-red-500' : ''"></span>
                        <div class="flex space-x-2 ml-8">
                            <template x-for="n in 10">
                                <label>
                                    <input type="radio" :name="'expenses-' + index" :value="n"
                                        x-model="form.expenses[index]"
                                        @change="errors.expenses[index] = false">
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
                    date: '{{ date('Y-m-d') }}',
                    area_code: '',
                    agent_name: '',
                    partner_name: '',
                    supervisor_name: '',
                    manager_name: '',
                    personalrelation: {},
                    grooming: {},
                    stocks: {},
                    expenses: {},
                    comments: '',
                },
                errors: {
                    date: false,
                    area_code: false,
                    agent_name: false,
                    partner_name: false,
                    supervisor_name: false,
                    manager_name: false,
                    personalrelation: {},
                    grooming: {},
                    stocks: {},
                    expenses: {},
                },
                questions: {
                    personalrelation: [
                        'Spirit of Entrepreneurship',
                        'Relationship to Clients',
                        'Relationship with Partner',
                        'Relationship with Superior'
                    ],
                    grooming: ['Dress', 'Cleanliness', 'Neatness', 'Odor'],
                    stocks: [
                        'Product Knowledge', 'Booking Mastery', 'Cooperation with Partner',
                        'a/r Concerns and Safety', 'Account Receivable Keeping',
                        'Vehicle Maintenance', 'Vehicle Cleanliness', 'Vehicle Reporting'
                    ],
                    expenses: [
                        'Meal Subsidy', 'Customer Snacks', 'Diesel Consumption',
                        'Lodging Expenses', 'Office Supplies'
                    ]
                },

                validateForm() {
                    let isValid = true;

                    // Reset errors
                    this.errors = {
                        date: false,
                        area_code: false,
                        agent_name: false,
                        partner_name: false,
                        supervisor_name: false,
                        manager_name: false,
                        personalrelation: {},
                        grooming: {},
                        stocks: {},
                        expenses: {},
                    };

                    // Validate text fields
                    for (let key of ['date', 'area_code', 'agent_name', 'partner_name', 'supervisor_name', 'manager_name']) {
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

                    // Show loading indicator
                    Swal.fire({
                        title: 'Submitting...',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });

                    try {
                        let response = await fetch("{{ route('form.submit') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify(this.form)
                        });

                        let result = await response.json();

                        // Close the loading modal before showing the result
                        Swal.close();

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
                        Swal.close();
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
