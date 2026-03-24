function register() {
    let user = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
    };

    localStorage.setItem("user", JSON.stringify(user));
    alert("Registered successfully!");
    window.location.href = "login.html";
}

function login() {
    let storedUser = JSON.parse(localStorage.getItem("user"));

    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    if (storedUser && storedUser.email === email && storedUser.password === password) {
        localStorage.setItem("loggedIn", "true");
        window.location.href = "profile.html";
    } else {
        alert("Invalid credentials");
    }
}

function logout() {
    localStorage.removeItem("loggedIn");
    window.location.href = "login.html";
}

function addSkill() {
    let skill = document.getElementById("skill").value;
    let type = document.getElementById("type").value;

    let skills = JSON.parse(localStorage.getItem("skills")) || [];
    skills.push({ skill, type });

    localStorage.setItem("skills", JSON.stringify(skills));
    displaySkills();
}

function displaySkills() {
    let skills = JSON.parse(localStorage.getItem("skills")) || [];
    let list = document.getElementById("skills");
    list.innerHTML = "";

    skills.forEach(s => {
        let li = document.createElement("li");
        li.innerText = s.skill + " (" + s.type + ")";
        list.appendChild(li);
    });
}

window.onload = function () {
    let user = JSON.parse(localStorage.getItem("user"));

    if (user && document.getElementById("userData")) {
        document.getElementById("userData").innerText =
            user.name + " | " + user.email;
    }

    if (document.getElementById("skills")) {
        displaySkills();
    }
};
