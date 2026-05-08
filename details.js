window.addEventListener("load", init)


function init() {
    fetchData()
}

async function fetchData() {
    const params = new URLSearchParams(window.location.search);
    const id = parseInt(params.get("id"))

    const result = await fetch("./projects.json")
    const data = await result.json()
    console.log(id)
    console.log('length:', data.projects.length)

    if (id >= data.projects.length || isNaN(id)) {
        window.location.href = './index.html'
        return;
    } else {
        placeData(data, id)
    }
}

function placeData(data, id) {
    const main = document.getElementById("main")
    const header = document.getElementById("header")
    const project = data.projects[id]

    if (project.name) {
        const headerName = header.querySelector("#header-name")
        const h1 = document.createElement('h1')
        h1.innerText = project.name
        headerName.appendChild(h1)
    }
    if (project.description) {
        const description = main.querySelector("#description")
        const p = document.createElement('p')
        p.innerText = project.description
        description.appendChild(p)
    }
    if (project.images.header) {
        const headerImage = main.querySelector("#header-image")
        const img = document.createElement('img')
        img.src = project.images.header.src
        img.alt = project.images.header.alt
        headerImage.appendChild(img)
    }

    if (project.contribution) {
        const contribution = main.querySelector("#contribution")
        const p = document.createElement('p')
        p.innerText = project.contribution
        contribution.appendChild(p)
    }


}

