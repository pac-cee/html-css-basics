document.addEventListener('DOMContentLoaded', function() {
    // Get the calculate button and add event listener
    const calculateButton = document.querySelector('input[value="Calculate"]');
    calculateButton.addEventListener('click', calculateSum);

    // Add input event listeners for validation
    const num1Input = document.getElementById('num1');
    const num2Input = document.getElementById('num2');

    [num1Input, num2Input].forEach(input => {
        input.addEventListener('input', function() {
            // Only allow numbers and decimal point
            this.value = this.value.replace(/[^0-9.]/g, '');
        });
    });
});

function calculateSum() {
    // Get the input values
