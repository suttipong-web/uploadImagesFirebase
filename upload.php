<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Upload Images Project CMU-Research</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="./index.css" />
    <!-- Import Firebase scripts cdn -->
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-storage.js"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="container">
        <div class="row col-md-12 justify-content-center">
            <div class="text-center text-withe pt-5">
                <h2 class="text-center">
                    <img src="images/estima-logo.png" style="width: 350px; margin: auto;" />
                </h2>
                <p>
                    Welcome to ESTIMA, AI-driven web-application for blood loss estimation

                </p>
                <p>
                <h3>วิธีการอัพโหลดรูป</h3>
                <div class="text-center mb-3">
                    1. กดปุ่ม Choose files <br />
                    2. เลือกรูปที่ต้องการ Upload (สามารถเลือกหลายรูปภาพพร้อมกันได้)<br />
                    3. กดปุ่ม Upload เป็นอันเสร็จสิ้น<br />
                    หมายเหตุ: หากต้องการ Upload รูปภาพอีกสามารถกลับไปทำตั้งแต่ข้อ 1 ใหม่ได้เลย
                </div>
                </p>
            </div> <br />
            <br />
            <div class="imageUpload mt-2">
                <input type="file" class="inp" onchange="getImageData(event)" multiple />
                <button onclick="selectImage()" class="selectImage">
                    Select Images
                </button>
                <div class="metaData"></div>
                <div class="progressBar">
                    <div class="progress"></div>
                </div>
                <button onclick="uploadImage()" class="upload">Upload</button>
                <span class="completeMsg"></span>
                <span class="loading">Loading...</span>
                <div class="row w-100">
                    <div class="images d-flex flex-row flex-wrap"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script>
    // Setting upload the filebase
    // Your web app's Firebase configuration
    const firebaseConfig = {
        apiKey: "AIzaSyCKAKGvBNsudwIYWKT5h1yMvWgohUHGomE",
        authDomain: "multiplefileupload-d2aa6.firebaseapp.com",
        projectId: "multiplefileupload-d2aa6",
        storageBucket: "multiplefileupload-d2aa6.appspot.com",
        messagingSenderId: "1054380351510",
        appId: "1:1054380351510:web:fcb37562a17dec66d0d537",
    };

    const app = firebase.initializeApp(firebaseConfig);
    const storage = firebase.storage();
    const inp = document.querySelector(".inp");
    const progressbar = document.querySelector(".progress");
    const img = document.querySelector(".img");
    const body = document.querySelector("body");
    const metaData = document.querySelector(".metaData");
    const images = document.querySelector(".images");
    const loading = document.querySelector(".loading");
    const imageUpload = document.querySelector(".imageUpload");
    const completeMsg = document.querySelector(".completeMsg");
    let file;
    let files;
    let fileName;
    let progress;
    let uploadedFileName;
    const selectImage = () => {
        inp.click();
    };
    const getImageData = (e) => {
        files = e.target.files;
        for (let i = 0; i < files.length; i++) {
            let imageData = document.createElement("span");
            imageData.className = "filedata";
            imageData.style.display = "block";
            imageData.innerHTML = files[i].name;
            metaData.appendChild(imageData);
        }
    };

    const uploadImage = async () => {
        for (let i = 0; i < files.length; i++) {
            let url = await uploadProcess(
                files[i],
                Math.round(Math.random() * 9999) + files[i].name
            );
            if (url) {
                loading.style.display = "none";
                let image = document.createElement("img");
                image.style.display = "block";
                image.setAttribute("src", url);
                image.className = "img";
                images.appendChild(image);
            }
            if (i === files.length - 1) {
                completeMsg.innerHTML = `${files.length} files uploaded successfully`;
            }
        }
    };

    const uploadProcess = (file, fileName) => {
        return new Promise((resolve, reject) => {
            // Folder on ferebase / myimages
            const storageRef = storage.ref().child("myimages");
            const folderRef = storageRef.child(fileName);
            const uploadtask = folderRef.put(file);
            uploadtask.on(
                "state_changed",
                (snapshot) => {
                    loading.style.display = "block";
                    progress =
                        (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    progress = Math.round(progress);
                    progressbar.style.width = progress + "%";
                    progressbar.innerHTML = progress + "%";
                    uploadedFileName = snapshot.ref.name;
                },
                (error) => {
                    reject(error);
                },
                () => {
                    storage
                        .ref("myimages")
                        .child(uploadedFileName)
                        .getDownloadURL()
                        .then((url) => {
                            console.log("URL", url);
                            resolve(url);
                        });
                }
            );
        });
    };
    </script>
</body>

</html>