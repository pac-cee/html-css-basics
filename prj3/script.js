function validateInputs() {
    let courseWorks = parseFloat(document.getElementById('courseWorks').value) || 0;
    let midTerm = parseFloat(document.getElementById('midTerm').value) || 0;
    let finalExam = parseFloat(document.getElementById('finalExam').value) || 0;

    // Validate input ranges
    if (courseWorks < 0 || courseWorks > 30) {
        alert('Course Works marks must be between 0 and 30');
        document.getElementById('courseWorks').value = '';
        return null;
    }

    if (midTerm < 0 || midTerm > 30) {
        alert('Mid Term marks must be between 0 and 30');
        document.getElementById('midTerm').value = '';
        return null;
    }

    if (finalExam < 0 || finalExam > 40) {
        alert('Final Exam marks must be between 0 and 40');
        document.getElementById('finalExam').value = '';
        return null;
    }

    return { courseWorks, midTerm, finalExam };
}

function calculateTotal() {
    const marks = validateInputs();
    if (!marks) return;

    const totalMarks = marks.courseWorks + marks.midTerm + marks.finalExam;
    document.getElementById('total').value = totalMarks;
    return totalMarks;
}

function calculateAverage() {
    const totalMarks = calculateTotal();
