
let classActivities, midTerm, finalExam;


document.addEventListener('DOMContentLoaded', function() {
    
    classActivities = document.getElementById('ClassActivities');
    midTerm = document.getElementById('MidTerm');
    finalExam = document.getElementById('FinalExam');

    
    [classActivities, midTerm, finalExam].forEach(input => {
        input.addEventListener('input', function() {
            if (this.value > 100) this.value = 100;
            if (this.value < 0) this.value = 0;
        });
    });
});

