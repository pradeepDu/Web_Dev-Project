<?php include "../include/navbar.php"?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://images.pexels.com/photos/7948055/pexels-photo-7948055.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100vw;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
            text-align: center;
            max-width: 600px;
            width: 90%;
        }

        h1 {
            margin-top: 0;
            color: #333;
            font-size: 36px;
            font-family: 'Karla', sans-serif; /* Change to Karla font */
        }

        label {
            font-weight: bold;
            font-size: 18px;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            transition: border-color 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: #39a5d7;
        }

        button {
            background-color: #3f7cd1;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-family: 'Stencil', sans-serif; /* Use stencil font */
        }

        button:hover {
            background-color: #45a049;
            transform: translateY(-3px); /* Move button up by 3 pixels */
        }

        .result {
            margin-top: 20px;
            font-size: 20px;
        }

        .error-message {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Added styles for columns */
        .column {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .investment-column {
            flex: 1;
            text-align: left;
            margin: 0 10px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Investment Calculator</h1>
        <label for="salary">Enter Your Salary ($):</label><br>
        <input type="number" id="salary" required><br><br>

        <button id="calculateSafeInvestment">Calculate Safe Investment</button>
        <div id="safeInvestmentResult" class="result"></div>

        <h2>Investment Details</h2>
        <form id="investmentForm">
            <div class="column">
                <div class="investment-column">
                    <label for="initialInvestment">Initial Investment ($):</label><br>
                    <input type="number" id="initialInvestment" required><br><br>
                </div>
                <div class="investment-column">
                    <label for="longTermInvestmentAmount">Long-Term Investment Amount ($):</label><br>
                    <input type="number" id="longTermInvestmentAmount" required><br><br>
                </div>
                <div class="investment-column">
                    <label for="riskInvestmentAmount">Risk Investment Amount ($):</label><br>
                    <input type="number" id="riskInvestmentAmount" required><br><br>
                </div>
            </div>
            
            <div class="column">
                <div class="investment-column">
                    <label for="annualInterestRate">Annual Interest Rate (%):</label><br>
                    <input type="number" id="annualInterestRate" step="0.01" required><br><br>
                </div>
                <div class="investment-column">
                    <label for="longTermInvestmentRate">Long-Term Investment Rate (%):</label><br>
                    <input type="number" id="longTermInvestmentRate" step="0.01" required><br><br>
                </div>
                <div class="investment-column">
                    <label for="riskInvestmentRate">Risk Investment Rate (%):</label><br>
                    <input type="number" id="riskInvestmentRate" step="0.01" required><br><br>
                </div>
            </div>

            <label for="years">Number of Years:</label><br>
            <input type="number" id="years" required><br><br>

            <button type="submit">Calculate Future Value</button>
            <div id="futureValueResult" class="result"></div>
        </form>
        <div id="error" class="error-message"></div>
    </div>

    <script>
        document.getElementById('calculateSafeInvestment').addEventListener('click', function() {
            var salaryInput = document.getElementById('salary');
            var salary = parseInt(salaryInput.value);

            // Check if salary is a positive integer
            if (Number.isInteger(salary) && salary > 0) {
                var safeInvestment = calculateSafeInvestment(salary);
                document.getElementById('safeInvestmentResult').innerHTML = 'Safe Investment: $' + safeInvestment.toFixed(2);
                document.getElementById('error').innerHTML = ''; // Clear any previous error messages
            } else {
                document.getElementById('error').innerHTML = 'Please enter a valid positive integer for salary.';
                salaryInput.value = ''; // Clear the input field
            }
        });

        document.getElementById('investmentForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var initialInvestment = parseFloat(document.getElementById('initialInvestment').value);
            var longTermInvestmentAmount = parseFloat(document.getElementById('longTermInvestmentAmount').value);
            var longTermInvestmentRate = parseFloat(document.getElementById('longTermInvestmentRate').value);
            var riskInvestmentAmount = parseFloat(document.getElementById('riskInvestmentAmount').value);
            var riskInvestmentRate = parseFloat(document.getElementById('riskInvestmentRate').value);
            var years = parseInt(document.getElementById('years').value);

            // Check if years is a positive integer
            if (!Number.isInteger(years) || years <= 0) {
                document.getElementById('error').innerHTML = 'Number of years must be a positive integer.';
                return;
            }

            if (initialInvestment !== longTermInvestmentAmount + riskInvestmentAmount) {
                document.getElementById('error').innerHTML = 'Sum of Long-Term and Risk Investments should be equal to Initial Investment.';
                return;
            }

            var annualInterestRate = (longTermInvestmentRate + riskInvestmentRate) / 2; // Average of long-term and risk interest rates
            var futureValue = calculateFutureValue(initialInvestment, annualInterestRate, years);
            document.getElementById('futureValueResult').innerHTML = 'Future Value: $' + futureValue.toFixed(2);
        });

        function calculateFutureValue(initialInvestment, annualInterestRate, years) {
            var monthlyInterestRate = annualInterestRate / 100;
            var months = years * 12;
            var futureValue = initialInvestment * Math.pow(1 + monthlyInterestRate, months);
            return futureValue;
        }

        function calculateSafeInvestment(salary) {
            if (salary <= 50000) {
                return 0.1 * salary;
            } else if (salary <= 80000) {
                return 20000;
            } else if (salary <= 100000) {
                return 25000 + (salary - 80000) / 20000 * 5000;
            } else {
                return null;
            }
        }
    </script>
</body>
</html>
