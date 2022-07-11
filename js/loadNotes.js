$body = document.querySelector("body");
$noteListContainer = document.querySelector(".notes-list-container");

function getBuildedNoteElement(orderedNum, id, text) {
    let noteContainer = document.createElement("div");
    noteContainer.className = "note-container";

    let noteTextContainer = document.createElement("div");
    noteTextContainer.className = "note-text-container";

    let noteNum = document.createElement("span");
    noteNum.className = "note-num";
    noteNum.innerHTML = "#" + orderedNum + ".";

    let noteText = document.createElement("p");
    noteText.className = "note-text";
    noteText.innerHTML = text;

    let removeNoteBtn = document.createElement("a");
    removeNoteBtn.className = "remove-note-btn";
    removeNoteBtn.href = "/note/remove?id=" + id;

    let removeNoteIcon = document.createElement("img");
    removeNoteIcon.src = "/img/trash-icon.svg";
    removeNoteIcon.alt = "remove-note-icon";

    noteTextContainer.appendChild(noteNum);
    noteTextContainer.appendChild(noteText);
    noteContainer.appendChild(noteTextContainer);
    removeNoteBtn.appendChild(removeNoteIcon);
    noteContainer.appendChild(removeNoteBtn);

    return noteContainer;
}

function showNotes() {
    $.getJSON("http://chat.local/notes", function (data) {
        for (let i = 0; i < data.length; i++) {
            $noteListContainer.appendChild(
                getBuildedNoteElement(i + 1, data[i]["id"], data[i]["text"])
            );
        }
    });
}

$body.onload = showNotes;
