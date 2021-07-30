const todoInput = document.querySelectorAll(".todoInput");

todoInput.forEach((input) => {
  input.addEventListener("click", () => {
    input.parentElement.submit();
    console.log(input, input.parentElement);
  });
});

const allBtn = document.getElementById("allBtn");
const activeBtn = document.getElementById("activeBtn");
const completedBtn = document.getElementById("completedBtn");
const trashIconsForm = document.querySelectorAll(
  '.container__todos__todo form[action="delete.php"]'
);
const deleteAllForm = document.querySelectorAll(
  '.container__todos form[action="deleteAll.php"]'
);

console.log(trashIconsForm);

const todosContainer = document.querySelectorAll(
  '.container__todos__todo form[action="change_status.php"] input'
);

function trashIconFormVisblaty(visblaty = "hiddne", todo) {
  deleteAllForm.forEach((dform) => {
    trashIconsForm.forEach((form) => {
      if (visblaty === "hiddne") {
        form.classList.add("hidden");
        dform.classList.add("hidden");
      } else {
        form.classList.remove("hidden");
        dform.classList.remove("hidden");
      }
    });
  });
}

function clearActiveClass() {
  allBtn.classList.remove("active");
  activeBtn.classList.remove("active");
  completedBtn.classList.remove("active");
}

allBtn.addEventListener("click", () => {
  clearActiveClass();
  allBtn.classList.toggle("active");
  trashIconFormVisblaty();

  todosContainer.forEach((child) => {
    child.parentElement.parentElement.classList.remove("hide");
    child.nextElementSibling.style.display = "inline-block";
  });
});

activeBtn.addEventListener("click", () => {
  clearActiveClass();
  activeBtn.classList.toggle("active");
  trashIconFormVisblaty();

  todosContainer.forEach((child) => {
    if (!child.classList.contains("checked")) {
      child.parentElement.parentElement.classList.remove("hide");
    } else {
      child.parentElement.parentElement.classList.add("hide");
    }
  });
});

completedBtn.addEventListener("click", () => {
  clearActiveClass();
  completedBtn.classList.toggle("active");

  todosContainer.forEach((child) => {
    trashIconFormVisblaty("show", child);
    if (child.classList.contains("checked")) {
      child.parentElement.parentElement.classList.remove("hide");
    } else {
      child.parentElement.parentElement.classList.add("hide");
    }
  });
});
