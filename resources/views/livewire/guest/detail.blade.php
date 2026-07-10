<livewire:admin.accessories.components.top-nav active="add-ons" />
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet"
            href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
        <style>
        .container {
            padding-bottom: 50px;
            width: 100%;

        }

            .hidden {
                display: none;
            }

        .main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            width: 100%;
        }

        .items {
            margin: 0px;
            cursor: pointer;
        }

        .savebtn {
            width: 150px;

        }

        .btn {
            width: 150px;
        }

        .colorbtn {
            width: 50px;
        }

        .main {
            width: 100%;
            height: 560px;
            margin: 30px;
            display: grid;

            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: 1fr 50px 50px 50px;

            row-gap: 10px;
        }

        #toggleButton {
            background-color: white;
            /* Set background color to white */

        }

        .small-button {
            width: 20px;
            height: 20px;
            padding: 5px;
            background-color: white;
        }

        .td {
            width: 115px;
        }

        .big-button {
            width: 20px;
            height: 20px;
            padding: 5px;
        }

        #pic1 {
            grid-column: 1/6;
        }

        #pic2 {
            margin-left: 13px;
        }

        #pic3 {
            margin-left: 13px;
        }

        #pic4 {
            margin-left: 13px;
        }

        #pic5 {
            margin-left: 13px;
        }
    </style>
        <title>Your Page Title</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <table style="width: 100%; margin-top: 100px" class="table">
                        <!-- Your table content goes here -->
                        <thead>
                            <tr>
                                <th style="color: purple" scope="col">
                                    iPhone 14 Biodegradable Purple Case
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <td>
                                        <div style="position: relative;">
                                            <select style="width: 150px"
                                                class="form-control">
                                                <option>Bumper Cases</option>
                                                <option>Carbon Cases</option>
                                                <option>Clear Cases</option>
                                                <option>Designer Cases</option>
                                            </select>
                                            <div
                                                style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%);">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div
                                            class="form-row justify-content-between">
                                            <div class="col-auto"
                                                id="variantToggleContainer">
                                                <button
                                                    onclick="toggleVariantInput()"
                                                    id="variantButton"
                                                    class="btn">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="30" height="30"
                                                        fill="currentColor"
                                                        class="bi bi-plus-lg"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col"
                                                id="variantInputContainer"
                                                style="display: none;">
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control">
                                                    <div
                                                        class="input-group-append">
                                                        <button
                                                            class="btn colorbtn btn-primary"
                                                            type="button">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                   
                                </tr>

                                <tr>
                                    <td>
                                        <div style="position: relative;">
                                            <select style="width: 150px"
                                                class="form-control "
                                                placeholder="Manufacturer">
                                                <option>Baseus</option>
                                                <option>Huawei</option>
                                                <option>iOttie</option>
                                                <option>Mophie</option>
                                                <option>Olixar</option>
                                                <option>Pama</option>
                                            </select>
                                            <div
                                                style="position: absolute; top: 50%; right: 20px; transform: translateY(-50%);">

                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div
                                            class="form-row justify-content-between">
                                            <div class="col-auto"
                                                id="manufacturerToggleContainer">
                                                <button
                                                    onclick="toggleManufacturerInput()"
                                                    id="manufacturerButton"
                                                    class="btn">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="30" height="30"
                                                        fill="currentColor"
                                                        class="bi bi-plus-lg"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            fill-rule="evenodd"
                                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="col"
                                                id="manufacturerInputContainer"
                                                style="display: none;">
                                                <div class="input-group">
                                                    <input type="text"
                                                        class="form-control">
                                                    <div
                                                        class="input-group-append">
                                                        <button
                                                            class="btn colorbtn btn-primary"
                                                            type="button">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td
                                        style="display: flex; align-items: center;">
                                        <div class="btn-group mr-2">
                                            <button type="button"
                                                class="btn btn-secondary dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true"
                                                aria-expanded="false">
                                                Colors
                                            </button>

                                            <div class="dropdown-menu">
                                                <div
                                                    class="custom-control custom-switch">

                                                    <label class
                                                        for="purpleToggle">Purple</label>
                                                </div>
                                                <div
                                                    class="custom-control custom-switch">

                                                    <label class
                                                        for="greenToggle">Green</label>
                                                </div>
                                                <div
                                                    class="custom-control custom-switch">

                                                    <label class
                                                        for="redToggle">Red</label>
                                                </div>
                                                <div
                                                    class="custom-control custom-switch">

                                                    <label class
                                                        for="blueToggle">Blue</label>
                                                </div>
                                                <div
                                                    class="custom-control custom-switch">
                                                    <label class
                                                        for="grayToggle">Gray</label>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="input-group">
                                            <input type="text"
                                                class="form-control"
                                                id="newColor"
                                                placeholder="New Color">
                                            <div class="input-group-append">
                                                <button
                                                    class="btn colorbtn btn-primary"
                                                    type="button"
                                                    onclick="addNewColor()">Add</button>
                                            </div>
                                        </div>
                                    </td>

                                    <td
                                        style="display: flex; align-items: center;">
                                        <button id="toggleButton"
                                            onclick="toggleButtonClick()">
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                width="30" height="30"
                                                height=" 16"
                                                fill="currentColor"
                                                class="bi bi-toggle2-off"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M9 11c.628-.836 1-1.874 1-3a4.98 4.98 0 0 0-1-3h4a3 3 0 1 1 0 6z" />
                                                <path
                                                    d="M5 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8m0 1A5 5 0 1 0 5 3a5 5 0 0 0 0 10" />
                                            </svg>
                                        </button>
                                        <input type="text" id="hexCode"
                                            class="form-control"
                                            style="width: 70px; margin-left: 10px;"
                                            placeholder="#RRGGBB"
                                            oninput="updateColorName()">
                                        <input type="color" id="colorPicker"
                                            class="form-control"
                                            style="width: 50px; margin-left: 10px;">

                                        <!-- Toggle button -->

                                    </td>

                                </tr>

                                <tr>
                                    <td>
                                        <div class="col">
                                            <input style="width: 100px"
                                                type="text" class="form-control"
                                                placeholder="price" />
                                        </td>
                                        <td></td>

                                    </tr>

                                </tr>
                                <tr>

                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <div class="form-row">
                                            <div class="col">
                                                <input
                                                    style="width: 300px; height: 180px;"
                                                    type="text"
                                                    class="form-control"
                                                    placeholder="Search Tags" />

                                            </div>
                                            <button onclick="savetags()"
                                                class="btn savebtn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 pb-5">
                    <div class="main" id="container">
                        <div class="items" id="pic1">
                            <div
                                style="position: relative; display: inline-block;">
                                <img
                                    src="https://ik.imagekit.io/b6iqka2sz/assets/1.jpg?updatedAt=1705345228635"
                                    height="460px"
                                    width="500px" alt />
                                <!-- Add Button -->
                                <button
                                    style="position: absolute; bottom: 0; right: 0; background-color: white;"
                                    onclick="yourFunction()">

                                </button>
                            </div>
                        </div>

                        <div onclick="clickme()" class="items" id="pic2">
                            <img
                                src="https://ik.imagekit.io/b6iqka2sz/assets/6.jpg?updatedAt=1705411778868"
                                height="90px"
                                width="90px" alt />
                            <!-- Delete Button -->
                            <button class="delete-button small-button"
                                onclick="deleteItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>

                            <!-- Edit Button -->
                            <button class="edit-button small-button"
                                onclick="editItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                        </div>

                        <div onclick="clickme1()" class="items" id="pic3">
                            <img
                                src="https://ik.imagekit.io/b6iqka2sz/assets/8.jpg?updatedAt=1705411958517"
                                height="90px"
                                width="90px" alt />
                            <!-- Delete Button -->
                            <button class="delete-button small-button"
                                onclick="deleteItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>

                            <!-- Edit Button -->
                            <button class="edit-button small-button"
                                onclick="editItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                        </div>

                        <div onclick="clickme2()" class="items" id="pic4">
                            <img
                                src="https://ik.imagekit.io/b6iqka2sz/assets/10.jpg?updatedAt=1705412134521"
                                height="90px"
                                width="90px" alt />
                            <!-- Delete Button -->
                            <button class="delete-button small-button"
                                onclick="deleteItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>

                            <!-- Edit Button -->
                            <button class="edit-button small-button"
                                onclick="editItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                        </div>

                        <div onclick="clickme3()" class="items" id="pic5">
                            <img
                                src="https://ik.imagekit.io/b6iqka2sz/assets/17.jpg?updatedAt=1705413211943"
                                height="90px"
                                width="90px" alt />
                            <!-- Delete Button -->
                            <button class="delete-button small-button"
                                onclick="deleteItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path
                                        d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                </svg>
                            </button>

                            <!-- Edit Button -->
                            <button class="edit-button small-button"
                                onclick="editItem()">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                        </div><!-- Paste your SVG code here -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="100"
                            height="100" fill="currentColor"
                            class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                            <path
                                d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0" />
                        </svg>
                    </div>

                </div>
            </div>
        </div>

        <script>

        function clickme() {
            var element = document.getElementById("pic1");
            element.innerHTML =
                '<img src ="https://ik.imagekit.io/b6iqka2sz/assets/6.jpg?updatedAt=1705411778868"  height="460px" width="500px" alt="">';
        }

        function clickme1() {
            var element1 = document.getElementById("pic1");
            element1.innerHTML =
                '<img src="https://ik.imagekit.io/b6iqka2sz/assets/8.jpg?updatedAt=1705411958517" height="460px" width="500px" alt="">';
        }

        function clickme2() {
            var element2 = document.getElementById("pic1");
            element2.innerHTML =
                '<img src="https://ik.imagekit.io/b6iqka2sz/assets/10.jpg?updatedAt=1705412134521" height="460px" width="500px" alt="">';
        }

        function clickme3() {
            var element3 = document.getElementById("pic1");
            element3.innerHTML =
                '<img src="https://ik.imagekit.io/b6iqka2sz/assets/17.jpg?updatedAt=1705413211943" height="460px" width="500px" alt="">';
        }

        function addNewColor() {
            var newColorInput = document.getElementById("newColor");
            var hexCodeInput = document.getElementById("hexCode");
            var colorPicker = document.getElementById("colorPicker");

            var newColorName = newColorInput.value.trim();
            var hexCode = hexCodeInput.value.trim() || colorPicker.value;

            if (newColorName !== "") {
                var dropdownMenu = document.querySelector(".dropdown-menu");
                var newSwitch = document.createElement("div");
                newSwitch.classList.add("custom-control", "custom-switch");

                var input = document.createElement("input");
                input.type = "checkbox";
                input.classList.add("custom-control-input");
                input.id = newColorName + "Toggle";

                var label = document.createElement("label");
                label.classList.add("custom-control-label");
                label.setAttribute("for", newColorName + "Toggle");
                label.innerText = newColorName;

                newSwitch.appendChild(input);
                newSwitch.appendChild(label);
                dropdownMenu.appendChild(newSwitch);

                // Clear the input fields
                newColorInput.value = "";
                hexCodeInput.value = "";
            }
        }

       
        function toggleVariantInput() {
        var container = document.getElementById("variantInputContainer");
        var button = document.getElementById("variantButton");

        // Toggle visibility of container
        container.style.display = container.style.display === "none" ? "block" : "none";

        // Hide plus button after click
        button.style.display = "none";
    }
        function toggleManufacturerInput() {
        var button = document.getElementById("manufacturerButton");
        var container = document.getElementById("manufacturerInputContainer");

        // Toggle visibility of container
        container.style.display = container.style.display === "none" ? "block" : "none";
        
        // Hide plus button after click
        button.style.display = "none";
    }
    </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>