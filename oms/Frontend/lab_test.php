<?php 
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Test Information (Accordions with Progress Bars)</title>
    <style>
        body {
            font-family: sans-serif;
            line-height: 1.6;
            /* margin: 20px; */
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .age-group {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }

        .age-group h2 {
            background-color: #f0f0f0;
            padding: 10px;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
        }

        .age-group h2::after { /* Style the icon */
            content: '+'; /* Initial icon */
            font-size: 20px;
            transition: transform 0.3s ease; /* Smooth rotation */
        }

        .age-group h2.active::after { /* Icon when active */
            content: '-';
            transform: rotate(180deg); /* Rotate 180 degrees */
        }

        .age-content {
            padding: 20px; /* Increased padding */
            display: none;
            border-top: 1px solid #ddd;
        }

        .test-item {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        .test-name {
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .progress-container {
            width: 100%;
            margin-bottom: 10px;
        }

        .progress-bar {
            height: 20px;
            display: flex;
            border-radius: 5px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .segment {
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: smaller;
            position: relative;
        }

        .very-good {
            /*background-color: #4CAF50;*/
            background-color: #008000;
        }

        .good-normal {
            /*background-color: #FFC107;*/
            background-color: #008080;
        }

        .not-good {
            /*background-color: #FF9800;*/
            background-color: #FFA500;
        }

        .needs-treatment {
            /*background-color: #F44336;*/
            background-color: #FF0000;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-top: 5px;
            font-size: smaller;
        }

        .category {
            text-align: center;
            margin-left: 9px;
        }

        .category-name {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
            color: #555;
        }

        .category-description {
            color: #777;
        }

        .percentage-label {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: smaller;
            color: white;
        }

        .disclaimer {
            font-size: smaller;
            color: #777;
            margin-top: 30px; /* Increased margin */
            text-align: center;
        }

        /* Mobile Responsiveness */
        @media (max-width: 600px) {
            .progress-info {
                flex-direction: column;
                align-items: center;
            }

            .category {
                margin-bottom: 10px;
            }

            .segment {
                font-size: x-small; /* Smaller font on mobile */
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Understanding Your Lab Test Results</h1>

        <div class="age-group">
            <h2>Kids (0–12 years) <span class="toggle-icon"></span></h2>
            <div class="age-content">
                <div class="test-item">
                    <div class="test-name">Complete Blood Count (CBC) - Hemoglobin</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 45%;">
                                <span class="percentage-label">12-13 g/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 55%;">
                                <span class="percentage-label">11-12 g/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 40%;">
                                <span class="percentage-label">10-11 g/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 45%;">
                                <span class="percentage-label">Below 10 g/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent oxygen-carrying capacity.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Within normal range.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Slightly low/high, further investigation may be needed.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Significantly low (anemia) or high. Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Iron Levels (Ferritin)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-70 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">20-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 25%;">
                                <span class="percentage-label">10-20 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 30%;">
                                <span class="percentage-label">Below 10 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severely depleted iron stores. Requires treatment.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin D</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-80 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">30-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">20-30 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 20 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal for bone health.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low Vitamin D levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency. Requires treatment.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Allergy Test (IgE)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">Mildly Elevated</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Significantly Elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Very High</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No allergies detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Mild sensitivity.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Significant allergies.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">High risk of severe reaction. Requires action plan.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">BMP - Glucose</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">70-100 mg/dL (fasting)</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">100-125 mg/dL (fasting)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">126+ mg/dL (fasting)</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Consistently High/Low</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent blood sugar control.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Within normal range.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High, may indicate prediabetes or diabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires immediate medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Urine Analysis - Protein</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">Negative/Trace</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Small Amount</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Moderate/Large Amount</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate a problem.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Stool Test (for parasites)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">No parasites seen</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Non-pathogenic parasites</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Pathogenic parasites</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No allergies detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May not require treatment.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires treatment.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Growth Hormone</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">Age-appropriate levels</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below/Above Range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Very High</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal growth hormone production.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate a growth disorder.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires action plan.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Lead Levels</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">< 5 µg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">5-10 µg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">> 10 µg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Safe lead levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Elevated lead levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Lead poisoning. Requires immediate intervention.</span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="age-group">
            <h2>Teenagers (12-18 years) <span class="toggle-icon"></span></h2>
            <div class="age-content">
            <div class="test-item">
                    <div class="test-name">CBC - Hemoglobin (Female)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">14-16 g/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">11-12 g/dL </span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10-11 g/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 10 g/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent oxygen-carrying capacity.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Within normal range.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Slightly low/high, further investigation may be needed.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Significantly low (anemia) or high. Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">CBC - Hemoglobin (Male)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">16-18 g/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">11-12 g/dL </span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10-11 g/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 10 g/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent oxygen-carrying capacity.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Within normal range.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Slightly low/high, further investigation may be needed.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Significantly low (anemia) or high. Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Lipid Panel - Total Cholesterol</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 170 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">170-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-239 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">240+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high cholesterol.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Triglycerides</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 150 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">150-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-499 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">500+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high triglycerides.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Thyroid Function Tests - TSH</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">0.4-4.0 mIU/L</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">4.0-10.0 mIU/L (may vary)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10.0 mIU/L or very low TSH</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Outside normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal thyroid function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">May indicate hypothyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate hyperthyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires further evaluation.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin D</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-80 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">30-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">20-30 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 20 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - ALT (Liver)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">7-56 U/L</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal liver function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate liver issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - Creatinine</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">0.5-1.0 mg/dL (may vary)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal kidney function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate kidney issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Iron Levels (Ferritin)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-70 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">20-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10-20 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 10 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Excellent iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low iron stores.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severely depleted iron stores.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin B12</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">500 pg/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">200-500 pg/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">< 200 pg/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal B12 levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Hormone levels</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">Age-appropriate levels</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Outside normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly outside normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal hormone balance.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate hormonal imbalance.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="age-group">
            <h2>Men (18+ years) <span class="toggle-icon"></span></h2>
            <div class="age-content">
            <div class="test-item">
                    <div class="test-name">Lipid Panel - Total Cholesterol</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 170 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">170-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-239 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">240+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high cholesterol.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Triglycerides</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 150 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">150-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-499 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">500+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high triglycerides.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">PSA (Prostate-Specific Antigen)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">< 4 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">4-10 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">> 10 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal PSA.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Elevated PSA, further evaluation needed.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Significantly elevated PSA, requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Testosterone</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">300-1000 ng/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal testosterone levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low testosterone.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very low testosterone.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - ALT (Liver)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">7-56 U/L</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal liver function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate liver issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - Creatinine</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">0.7-1.3 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal kidney function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate kidney issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">CBC - Hemoglobin</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">14-18 g/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal hemoglobin.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low hemoglobin.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very low hemoglobin.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin D</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-80 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">30-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">20-30 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 20 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin B12</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">> 500 pg/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">200-500 pg/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">< 200 pg/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Fasting Blood Glucose</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">70-100 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">100-125 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">126+ mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Consistently high or very low</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal fasting glucose.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Prediabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Diabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires immediate medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="age-group">
            <h2>Women (18+ years) <span class="toggle-icon"></span></h2>
            <div class="age-content">
            <div class="test-item">
                    <div class="test-name">Lipid Panel - Total Cholesterol</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 170 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">170-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-239 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">240+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high cholesterol.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Triglycerides</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 150 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">150-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-499 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">500+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high triglycerides.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Thyroid Function Tests - TSH</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">0.4-4.0 mIU/L</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">4.0-10.0 mIU/L (may vary)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10.0 mIU/L or very low TSH</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Outside normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal thyroid function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">May indicate hypothyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate hyperthyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires further evaluation.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin D</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-80 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">30-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">20-30 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 20 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - ALT (Liver)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">7-56 U/L</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal liver function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate liver issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - Creatinine</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">0.7-1.3 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal kidney function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate kidney issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">CBC - Hemoglobin</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">14-18 g/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal hemoglobin.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low hemoglobin.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very low hemoglobin.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin B12</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">> 500 pg/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">200-500 pg/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">< 200 pg/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Fasting Blood Glucose</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">70-100 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">100-125 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">126+ mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Consistently high or very low</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal fasting glucose.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Prediabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Diabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires immediate medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Hormone levels (e.g., FSH, LH, Estradiol)</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">Age-appropriate levels</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Outside normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly outside normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal hormone balance.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate hormonal imbalance.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="age-group">
            <h2>Senior Citizens (60+ years) <span class="toggle-icon"></span></h2>
            <div class="age-content">
            <div class="test-item">
                    <div class="test-name">Comprehensive Metabolic Panel - Creatinine</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">0.7-1.3 mg/dL </span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Slightly elevated for age</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly elevated for age</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problem detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal kidney function (for age).</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate age-related kidney decline.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Lipid Panel - Total Cholesterol</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 170 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">170-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-239 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">240+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High cholesterol.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high cholesterol.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Triglycerides</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">< 150 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">150-199 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">200-499 mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">500+ mg/dL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Borderline high triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">High triglycerides.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very high triglycerides.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin B12</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">> 500 pg/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">200-500 pg/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">< 200 pg/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low B12.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Vitamin D</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">50-80 ng/mL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">30-50 ng/mL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">20-30 ng/mL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Below 20 ng/mL</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Optimal Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Sufficient Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low Vitamin D.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Severe deficiency.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Thyroid Function Tests - TSH</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">0.4-4.0 mIU/L</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">4.0-10.0 mIU/L (may vary)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">10.0 mIU/L or very low TSH</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Outside normal range</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal thyroid function.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">May indicate hypothyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate hyperthyroidism.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires further evaluation.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">CBC - Hemoglobin</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undecteable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">12-16 g/dL(may vary)</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below normal range for age</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Significantly below normal range for age</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problems detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal hemoglobin (for age).</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Low hemoglobin.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Very low hemoglobin.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Fasting Blood Glucose</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">70-100 mg/dL</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">100-125 mg/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">126+ mg/dL</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Consistently high or very low</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">Normal fasting glucose.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Prediabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">Diabetes.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires immediate medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="test-item">
                    <div class="test-name">Albumin</div>
                    <div class="progress-container">
                        <div class="progress-bar">
                            <div class="segment very-good" style="width: 40%;">
                                <span class="percentage-label">Low/Undetectable</span>
                            </div>
                            <div class="segment good-normal" style="width: 50%;">
                                <span class="percentage-label">3.5-5.0 g/dL</span>
                            </div>
                            <div class="segment not-good" style="width: 10%;">
                                <span class="percentage-label">Below normal range</span>
                            </div>
                            <div class="segment needs-treatment" style="width: 0%;">
                                <span class="percentage-label">Consistently high or very low</span>
                            </div>
                        </div>
                        <div class="progress-info">
                            <div class="category">
                                <span class="category-name">Very Good:</span>
                                <span class="category-description">No problems detected.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Good/Normal:</span>
                                <span class="category-description">Normal albumin levels.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Not Good:</span>
                                <span class="category-description">May indicate malnutrition or other health issues.</span>
                            </div>
                            <div class="category">
                                <span class="category-name">Needs to be Treated:</span>
                                <span class="category-description">Requires medical attention.</span>
                            </div>
                        </div>
                    </div>
                </div>  

            </div>
        </div>

        <div class="disclaimer">
            <p><strong>Disclaimer:</strong> The information provided on this page is for general knowledge and informational purposes only, and does not constitute medical advice. It is essential to consult with a qualified healthcare professional for any health concerns or before making any decisions related to your health or treatment. Do not use this information for self-diagnosis or treatment.</p>
        </div>
    </div>

    <script>
        // ... (JavaScript for accordion functionality - same as before) ...
        const ageGroupHeaders = document.querySelectorAll('.age-group h2');

        ageGroupHeaders.forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
                header.classList.toggle('active'); // Toggle active class for icon rotation
            });
        });
    </script>

    <!-- Footer -->
    <?php include('footer.php'); ?>
</body>
</html>