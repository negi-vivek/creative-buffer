// Function to add more fields
function addFields() {
    var container = document.getElementById("additional_field_container");
    var newFieldDiv = document.createElement("div");
    newFieldDiv.innerHTML = `
<div class="flex">
            <input type="text"
                   class="mx-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    name="fieldName[]"
                     placeholder="Field Name"
                     required
                     >
            <input type="text"
                   class="mx-1 bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    name="fieldValue[]"
                    placeholder="Value"
                    required
                    >
            <button type="button" onclick="removeFields(this)">X</button>
</div>

            `;
    container.appendChild(newFieldDiv);
}

// Function to remove fields
function removeFields(button) {
    var container = button.parentNode.parentNode;
    container.removeChild(button.parentNode);
}
