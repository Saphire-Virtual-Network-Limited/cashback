<?php
include("components/head.php");

// Call the getDeviceBrand function to retrieve the brands
$brands = getDeviceBrand();
?>

<body>
    <a href="#main-content" class="skip-link">
        Skip to main content
    </a>

    <main id="main-content" class="grid grid-cols-2 gap-14 p-16">
        <!--- side view -->
        <section class="left-section" aria-labelledby="welcome-heading">

            <?php include("components/welcome.php"); ?>

            <nav aria-label="Application progress" class="mb-10">
                <ul class="list-none p-0 m-0 space-y-6">
                    <li class="progress-step" data-section="application-details">
                        <div class="flex items-center bg-white p-4 rounded-xl shadow-lg">
                            <div class="step-indicator w-12 h-12 bg-red-600 bg-opacity-20 rounded-full mr-6"
                                aria-hidden="true"></div>
                            <div class="flex items-center gap-3">
                                <img src="assets/img/user-story.jpg" alt="" width="52" height="52" aria-hidden="true" />
                                <div>
                                    <h3 class="text-xl font-medium text-neutral-800">Application Details</h3>
                                    <p class="text-neutral-800 opacity-60">Personal and Device Information</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="progress-step" data-section="payment">
                        <div class="flex items-center bg-white p-4 rounded-xl shadow-lg">
                            <div class="step-indicator w-12 h-12 bg-red-600 bg-opacity-20 rounded-full mr-6"
                                aria-hidden="true"></div>
                            <div class="flex items-center gap-3">
                                <img src="assets/img/credit-card-pos.jpg" alt="" width="52" height="52"
                                    aria-hidden="true" />
                                <div>
                                    <h3 class="text-xl font-medium text-neutral-800">Payment</h3>
                                    <p class="text-neutral-800 opacity-60">Pay for Insurance</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="progress-step active" data-section="device-verification">
                        <div class="flex items-center bg-white p-4 rounded-xl shadow-lg">
                            <div class="step-indicator w-12 h-12 bg-red-600 rounded-full mr-6" aria-hidden="true"></div>
                            <div class="flex items-center gap-3">
                                <img src="assets/img/checkmark-badge-02.jpg" alt="" width="52" height="52"
                                    aria-hidden="true" />
                                <div>
                                    <h3 class="text-xl font-semibold text-red-600">Device Verification</h3>
                                    <p class="text-neutral-800 opacity-60">Upload device image for verification</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>

            <div class="cashback-promo relative rounded-xl bg-cover bg-center text-black mb-8" role="complementary">
                <img src="assets/img/group.jpg" alt="" class="rounded-xl" aria-hidden="true" />
            </div>

            <?php include("components/footer.php"); ?>
        </section>

        <!--- application view -->
        <section id="application-details" class="section-content active right-section bg-stone-50 rounded-sm p-9"
            aria-labelledby="application-form-heading">
            <header class="border-b border-neutral-800 border-opacity-30 pb-6 mb-9">
                <div class="flex items-center gap-3.5">
                    <img src="assets/img/user-story.jpg" alt="" width="52" height="52" aria-hidden="true" />
                    <div>
                        <h2 id="application-form-heading" class="text-xl font-semibold text-neutral-800">
                            Application Details
                        </h2>
                        <p class="text-base text-neutral-800 opacity-70">Personal and Device Information</p>
                    </div>
                </div>
            </header>

            <form class="space-y-6" novalidate>
                <fieldset>
                    <legend class="text-base font-semibold text-neutral-800 mb-5">Personal Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
                        <div>
                            <label class="sr-only" for="firstName">
                                First Name
                            </label>
                            <input type="text" id="firstName" name="firstName" class="form-input"
                                placeholder="First Name" required />
                        </div>
                        <div>
                            <label class="sr-only" for="lastName">
                                Last Name
                            </label>
                            <input type="text" id="lastName" name="lastName" class="form-input" placeholder="Last Name"
                                required />
                        </div>
                        <div>
                            <label class="sr-only" for="phone">
                                Phone Number
                            </label>
                            <input type="tel" id="phone" name="phone" class="form-input" placeholder="Phone Number"
                                required />
                        </div>
                        <div>
                            <label class="sr-only" for="email">
                                Email
                            </label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="Email"
                                required />
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="text-base font-semibold text-neutral-800 mb-5">Device Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3.5">
                        <div>
                            <label for="deviceBrand" class="text-sm text-neutral-800 mb-3 block">
                                Your Device Brand
                            </label>
                            <select id="deviceBrand" name="deviceBrand" class="form-input" required>
                                <option value="">Select a brand</option>
                                <?php
                                // Loop through the brands and create an option for each
                                if (!empty($brands)) {
                                    foreach ($brands as $brand) {
                                        echo "<option value='$brand'>" . ucwords($brand) . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>No brands available</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div>
                            <label for="deviceModel" class="text-sm text-neutral-800 mb-3 block">
                                Your Device Name
                            </label>
                            <select id="deviceModel" name="deviceModel" class="form-input" required>
                                <option value=""></option>
                            </select>
                        </div>
                        <div>
                            <label for="imei" class="text-sm text-neutral-800 mb-3 block">
                                Your Device IMEI (Dial *#06# to get IMEI)
                            </label>
                            <input type="text" id="imei" name="imei" class="form-input" placeholder="Enter IMEI number"
                                required pattern="[0-9]{15}" />
                        </div>
                        <div>
                            <label for="condition" class="text-sm text-neutral-800 mb-3 block">
                                Your Device Condition
                            </label>
                            <select id="condition" name="condition" class="form-input" required>
                                <option value="excellent">Excellent Condition (No Issue)</option>
                                <option value="good">Good Condition</option>
                                <option value="fair">Fair Condition</option>
                            </select>
                        </div>
                    </div>
                </fieldset>

                <fieldset>
                    <legend class="text-base font-semibold text-neutral-800 mb-5">Cost</legend>
                    <div class="bg-amber-200 bg-opacity-20 p-4 rounded-xl flex items-center gap-3">
                        <img src="assets/img/check.png" alt="" width="24" height="24" aria-hidden="true" />
                        <p class="text-neutral-800">
                            Screen, liquid damage and Anti-Theft
                            <strong>(#140,000)</strong>
                        </p>
                    </div>
                </fieldset>

                <div class="flex items-center gap-3">
                    <input type="checkbox" id="terms" name="terms" required class="w-6 h-6" />
                    <label for="terms" class="text-neutral-800">
                        Accept Terms and Conditions
                    </label>
                </div>

                <button type="submit" class="button-primary w-full md:w-auto flex items-center justify-center gap-2.5">
                    Proceed to make payment
                    <img src="assets/img/arrow-right-02.jpg" alt="" width="24" height="24" aria-hidden="true" />
                </button>
            </form>
        </section>

        <!-- Device verification view -->
        <section id="device-verification" class="section-content active right-section bg-stone-50 rounded-sm p-9"
            aria-labelledby="device-verification-heading">
            <div id="verification-stage1" class="verification-stage active" role="region"
                aria-labelledby="stage1-heading">
                <header class="border-b border-neutral-800 border-opacity-30 pb-6 mb-9">
                    <div class="flex items-center gap-3.5">
                        <img src="assets/img/checkmark-badge-02.jpg" alt="" width="52" height="52" aria-hidden="true" />
                        <div>
                            <h2 id="stage1-heading" class="text-xl font-semibold text-neutral-800">
                                Device Verification - Stage 1
                            </h2>
                            <p class="text-base text-neutral-800 opacity-70">Upload device images for initial
                                verification</p>
                        </div>
                    </div>
                </header>

                <form id="stage1Form" class="space-y-6" novalidate>
                    <fieldset>
                        <legend class="text-base font-semibold text-neutral-800 mb-5">Verification Method</legend>
                        <button type="button"
                            class="flex w-full justify-between items-center px-5 py-3.5 rounded-xl border border-solid bg-white bg-opacity-60 border-neutral-800 border-opacity-30 min-h-[52px] text-neutral-800 text-opacity-60">
                            <span>Online Verification</span>
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/43db2c71827166c1ce0e237acd026827d763fb4afe7e13b1bd3befcf88f3cfd2?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                alt="" width="24" height="24" aria-hidden="true" />
                        </button>
                    </fieldset>

                    <fieldset>
                        <legend class="text-base font-semibold text-neutral-800 mb-5">Device Images</legend>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="frontImage" class="text-sm font-semibold text-neutral-800 mb-3 block">
                                    Front of Device
                                </label>
                                <div class="relative">
                                    <input type="file" id="frontImage" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        aria-label="Upload front of device image" required />
                                    <div
                                        class="flex flex-col items-center justify-center p-8 border-2 border-dashed border-neutral-800 border-opacity-30 rounded-xl text-center">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/64ae54b66224520172febec10a25abe5a9dfd586bfa54dd56b530a27bb1952c4?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                            alt="" width="52" height="52" aria-hidden="true" />
                                        <p class="mt-4 font-medium">Click to Upload Front Image</p>
                                        <p class="mt-2 text-sm text-neutral-800 text-opacity-60">JPG or PNG, max 5MB</p>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="backImage" class="text-sm font-semibold text-neutral-800 mb-3 block">
                                    Back of Device
                                </label>
                                <div class="relative">
                                    <input type="file" id="backImage" accept="image/*"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                        aria-label="Upload back of device image" required />
                                    <div
                                        class="flex flex-col items-center justify-center p-8 border-2 border-dashed border-neutral-800 border-opacity-30 rounded-xl text-center">
                                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/64ae54b66224520172febec10a25abe5a9dfd586bfa54dd56b530a27bb1952c4?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                            alt="" width="52" height="52" aria-hidden="true" />
                                        <p class="mt-4 font-medium">Click to Upload Back Image</p>
                                        <p class="mt-2 text-sm text-neutral-800 text-opacity-60">JPG or PNG, max 5MB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="flex justify-between mt-8">
                        <button type="button" class="button-primary bg-zinc-300" id="backButton">
                            <span class="flex items-center gap-2">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ef2fd7782e2bfdd22ef8caf835d51bec3d31e53152e76610151f6b75038be4f?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                                Back
                            </span>
                        </button>
                        <button type="button" id="nextStageButton" class="button-primary">
                            <span class="flex items-center gap-2">
                                Next Stage
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f3fbf5c9fe7727a5a43c230cc670c0a0a5bf02ef2c532187f65bb6932c990aaa?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                            </span>
                        </button>
                    </div>
                </form>
            </div>

            <div id="verification-stage2" class="verification-stage" role="region" aria-labelledby="stage2-heading">
                <header class="border-b border-neutral-800 border-opacity-30 pb-6 mb-9">
                    <div class="flex items-center gap-3.5">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bcd5fa4c61f471b9a625300d43fd006e64fb856b73ab8e7ec1548febca9df2e0?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                            alt="" width="52" height="52" aria-hidden="true" />
                        <div>
                            <h2 id="stage2-heading" class="text-xl font-semibold text-neutral-800">
                                Device Verification - Stage 2
                            </h2>
                            <p class="text-base text-neutral-800 opacity-70">Select your preferred store location</p>
                        </div>
                    </div>
                </header>

                <form id="stage2Form" class="space-y-6" novalidate>
                    <fieldset>
                        <legend class="text-base font-semibold text-neutral-800 mb-5">Store Selection</legend>
                        <div class="flex flex-col gap-5">
                            <button type="button"
                                class="store-select-button flex justify-between items-center px-5 py-3.5 rounded-xl border border-solid bg-white bg-opacity-60 border-neutral-800 border-opacity-30 min-h-[52px] text-neutral-800 text-opacity-60"
                                role="radio" aria-checked="false">
                                <span>Lagos Main Branch</span>
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/43db2c71827166c1ce0e237acd026827d763fb4afe7e13b1bd3befcf88f3cfd2?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                            </button>
                            <button type="button"
                                class="store-select-button flex justify-between items-center px-5 py-3.5 rounded-xl border border-solid bg-white bg-opacity-60 border-neutral-800 border-opacity-30 min-h-[52px] text-neutral-800 text-opacity-60"
                                role="radio" aria-checked="false">
                                <span>245, Ikeja GRA, Lagos</span>
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/43db2c71827166c1ce0e237acd026827d763fb4afe7e13b1bd3befcf88f3cfd2?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                            </button>
                        </div>
                    </fieldset>

                    <div class="flex justify-between mt-8">
                        <button type="button" id="backToStage1" class="button-primary bg-zinc-300">
                            <span class="flex items-center gap-2">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ef2fd7782e2bfdd22ef8caf835d51bec3d31e53152e76610151f6b75038be4f?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                                Back
                            </span>
                        </button>
                        <button type="submit" class="button-primary">
                            <span class="flex items-center gap-2">
                                Next Page
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f3fbf5c9fe7727a5a43c230cc670c0a0a5bf02ef2c532187f65bb6932c990aaa?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div id="verification-stage3" class="verification-stage" role="region" aria-labelledby="stage3-heading">
                <header class="border-b border-neutral-800 border-opacity-30 pb-6 mb-9">
                    <div class="flex items-center gap-3.5">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/bcd5fa4c61f471b9a625300d43fd006e64fb856b73ab8e7ec1548febca9df2e0?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                            alt="" width="52" height="52" aria-hidden="true" />
                        <div>
                            <h2 id="stage3-heading" class="text-xl font-semibold text-neutral-800">
                                Device Verification - Final Stage
                            </h2>
                            <p class="text-base text-neutral-800 opacity-70">Complete verification process</p>
                        </div>
                    </div>
                </header>

                <form id="stage3Form" class="space-y-6" novalidate>
                    <fieldset>
                        <legend class="text-base font-semibold text-neutral-800 mb-5">Verification Method</legend>
                        <div
                            class="flex flex-wrap gap-10 justify-between items-center px-5 py-3.5 mt-5 w-full rounded-xl border border-solid bg-white bg-opacity-60 border-neutral-800 border-opacity-30 min-h-[52px] text-neutral-800 text-opacity-60 max-md:max-w-full">
                            <div class="gap-6 self-stretch my-auto">Whatsapp Chat</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/43db2c71827166c1ce0e237acd026827d763fb4afe7e13b1bd3befcf88f3cfd2?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend class="text-base font-semibold text-neutral-800 mb-5">Reference ID</legend>
                        <div
                            class="flex flex-wrap gap-10 justify-between items-center px-5 py-3.5 mt-5 w-full whitespace-nowrap rounded-xl border border-solid bg-neutral-800 bg-opacity-10 border-neutral-800 border-opacity-30 min-h-[52px] text-neutral-800 text-opacity-60 max-md:max-w-full">
                            <div class="gap-6 self-stretch my-auto">43563892DFC</div>
                            <img loading="lazy"
                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/d8a4c76340581a8dc615ce59d81b5ad2c8f0205699c7467a44430164d071c63f?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        </div>
                    </fieldset>

                    <div
                        class="flex gap-2.5 justify-center items-center px-5 py-3.5 mt-9 max-w-full font-bold bg-red-600 rounded-xl min-h-[52px] text-white text-opacity-80 w-[226px]">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/621c280a0b93b916f8694e6a3eb041f0dbea85db23ab0709a1667bfb798f3626?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                            alt="" class="object-contain shrink-0 self-stretch my-auto w-6 aspect-square" />
                        <div class="self-stretch my-auto">Chat with Support</div>
                    </div>

                    <div class="flex justify-between mt-72 max-md:mt-10">
                        <button type="button" id="backToStage2" class="button-primary bg-zinc-300">
                            <span class="flex items-center gap-2">
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0ef2fd7782e2bfdd22ef8caf835d51bec3d31e53152e76610151f6b75038be4f?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                                Back
                            </span>
                        </button>
                        <button type="submit" id="submitApplication" class="button-primary">
                            <span class="flex items-center gap-2">
                                Submit Application
                                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f3fbf5c9fe7727a5a43c230cc670c0a0a5bf02ef2c532187f65bb6932c990aaa?placeholderIfAbsent=true&apiKey=05a4bc4b171241268af1603dcd6b4945"
                                    alt="" width="24" height="24" aria-hidden="true" />
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/ajax.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const applicationDetails = document.getElementById("application-details");
            const deviceVerification = document.getElementById("device-verification");
            const progressSteps = document.querySelectorAll(".progress-step");
            const stage1 = document.getElementById("verification-stage1");
            const stage2 = document.getElementById("verification-stage2");
            const stage3 = document.getElementById("verification-stage3");
            const nextStageButton = document.getElementById("nextStageButton");
            const backToStage1 = document.getElementById("backToStage1");
            const backToStage2 = document.getElementById("backToStage2");
            const storeButtons = document.querySelectorAll('[role="radio"]');
            const stage2Form = document.getElementById("stage2Form");
            const stage3Form = document.getElementById("stage3Form");
            const backButton = document.getElementById("backButton");

            function switchSection(section) {
                const sections = document.querySelectorAll(".section-content");
                sections.forEach((s) => s.classList.remove("active"));
                section.classList.add("active");
            }

            function switchStage(fromStage, toStage) {
                fromStage.classList.remove("active");
                toStage.classList.add("active");
                const firstFocusable = toStage.querySelector(
                    'button, input[type="text"], input[type="file"], [tabindex="0"]');
                if (firstFocusable) {
                    firstFocusable.focus();
                }
            }

            progressSteps.forEach((step) => {
                step.addEventListener("click", function() {
                    const section = this.dataset.section;
                    progressSteps.forEach((s) => s.classList.remove("active"));
                    this.classList.add("active");

                    if (section === "application-details") {
                        switchSection(applicationDetails);
                    } else if (section === "device-verification") {
                        switchSection(deviceVerification);
                    }
                });
            });

            window.addEventListener("load", function() {
                switchSection(applicationDetails);
                const activeStep = document.querySelector(
                    '.progress-step[data-section="application-details"]');
                if (activeStep) {
                    activeStep.classList.add("active");
                }
            });

            nextStageButton.addEventListener("click", () => {
                const frontImage = document.getElementById("frontImage");
                const backImage = document.getElementById("backImage");

                if (!frontImage.files.length || !backImage.files.length) {
                    alert("Please upload both device images before proceeding");
                    return;
                }

                switchStage(stage1, stage2);
            });

            backToStage1.addEventListener("click", () => {
                switchStage(stage2, stage1);
            });

            backToStage2.addEventListener("click", () => {
                switchStage(stage3, stage2);
            });

            backButton.addEventListener("click", () => {
                switchSection(applicationDetails);
                const deviceVerificationStep = document.querySelector(
                    '.progress-step[data-section="device-verification"]');
                const applicationDetailsStep = document.querySelector(
                    '.progress-step[data-section="application-details"]');
                deviceVerificationStep.classList.remove("active");
                applicationDetailsStep.classList.add("active");
            });

            storeButtons.forEach((button) => {
                button.addEventListener("click", function() {
                    storeButtons.forEach((btn) => {
                        btn.setAttribute("aria-checked", "false");
                        btn.classList.remove("border-red-600");
                    });
                    this.setAttribute("aria-checked", "true");
                    this.classList.add("border-red-600");
                });

                button.addEventListener("keydown", function(e) {
                    if (e.key === " " || e.key === "Enter") {
                        e.preventDefault();
                        this.click();
                    }
                });
            });

            stage2Form.addEventListener("submit", function(e) {
                e.preventDefault();
                const selectedStore = document.querySelector('[aria-checked="true"]');

                if (!selectedStore) {
                    alert("Please select a store location");
                    return;
                }

                switchStage(stage2, stage3);
            });

            stage3Form.addEventListener("submit", function(e) {
                e.preventDefault();
                window.location.href = "payment.html";
            });

            document.addEventListener("keydown", function(e) {
                if (e.key === "Escape") {
                    if (stage3.classList.contains("active")) {
                        switchStage(stage3, stage2);
                    } else if (stage2.classList.contains("active")) {
                        switchStage(stage2, stage1);
                    }
                }
            });
        });
    </script>
</body>

</html>