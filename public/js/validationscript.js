function detectInput(currentInput) {
    var parentDiv = currentInput.parentElement;

    const previousSiblings = [];
    let sibling = parentDiv.previousElementSibling;

    while (sibling) {
        previousSiblings.push(sibling);
        sibling = sibling.previousElementSibling;
     }
    // Iterate over all the previous input elements
    previousSiblings.forEach(function(previousInput) {

        const children = previousInput.children;


        const input = children[1];
        const errorText = children[2];
        // Check if the current input is required
        if (input.hasAttribute('required')) {
            if (input.value === '') {
                errorText.classList.remove('d-none');
                input.classList.add('border-danger');
            } else {
                errorText.classList.add('d-none');
                input.classList.remove('border-danger');
            }
        } else {
            if (input.value === '') {
                errorText.classList.add('d-none');
                input.classList.remove('border-danger');
            } else {
                errorText.classList.add('d-none');
                input.classList.remove('border-danger');
            }
        }
    });
}
