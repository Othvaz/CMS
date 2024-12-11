
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- [head content unchanged] -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>AR Ghost Viewer with Sound</title>
    <script src="https://aframe.io/releases/1.0.4/aframe.min.js"></script>
    <script src="https://cdn.rawgit.com/jeromeetienne/AR.js/1.6.2/aframe/build/aframe-ar.min.js"></script>
    <style>
        /* Styling for the timer and boolean boxes */
        #timerBox, #boolBox {
            position: fixed;
            top: 10px;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            font-size: 18px;
            border-radius: 5px;
            z-index: 999;
        }
        #timerBox {
            left: 10px;
        }
        #boolBox {
            left: 150px; /* Positioned next to the timer box */
        }

        /* Popup Styling */
        #popup {
            width: 500px;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            border: 2px solid #333;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            z-index: 2000;
        }
        #popup img {
            width: 100px;
            height: 100px;
            margin-bottom: 10px;
        }
        #popup button {
            padding: 10px 20px;
            background-color: #4CC3D9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        #popup button:hover {
            background-color: #00FF00; /* Green hover effect */
        }
    </style>
</head>
<body>
    <div id="popup">
        @foreach ($markers as $m)
            @if ($loop->iteration==1)
                <img id="popupImage" src="{{asset('storage/' . $m->pattern->image)}}" alt="Find Me Image">
            @endif
        @endforeach
        <h2 id="popupText">Find Me!</h2>
        <button id="closePopup">Close</button>
    </div>

    <div id="timerBox" style="opacity:0;"></div> <!-- Timer UI Box -->
    <div id="boolBox">Currently doing Task 1, Part 1</div> <!-- Boolean UI Box -->

    <a-scene embedded arjs>
    @foreach ($markers as $m)
    
        <a-marker preset="custom" type="pattern" url="{{asset('storage/' . $m->pattern->path)}}" id="marker{{$loop->iteration}}">
            <a-video id="video{{$loop->iteration}}" src="#marker-video{{$loop->iteration}}" width="5" height="5" 
                position="0 0.5 0" 
                rotation="-90 0 0" 
                scale="1 1 1"
                visible="false">
            </a-video>
        </a-marker>

    @endforeach

        <a-entity camera fov="80">
            <a-cursor id="cursor" color="#FF0000" diameter="0.1"></a-cursor>
        </a-entity>
    
    
        <a-assets>
            @foreach ($markers as $m)
                <video id="marker-video{{$loop->iteration}}" src="{{asset('storage/' .  $m->video->path)}}" loop="true"></video>
            @endforeach
        </a-assets>
        
       
    </a-scene>

    <script>
        @foreach ($markers as $m)
            const marker{{$loop->iteration}} = document.querySelector('#marker{{$loop->iteration}}');
            const video{{$loop->iteration}} = document.querySelector("#marker-video{{$loop->iteration}}");
            const avideo{{$loop->iteration}} = document.querySelector('#video{{$loop->iteration}}');
        @endforeach

        const boolBox = document.querySelector('#boolBox');   // Boolean box element
        const popup = document.getElementById('popup');
        const popupImage = document.getElementById('popupImage');
        const closePopup = document.getElementById('closePopup');

        
        // let pictureList = ["FramePics/Frame1.jpg", "FramePics/Frame2.jpg", "FramePics/Frame3.jpg", "FramePics/Hiro.png", "FramePics/Kanji.png"];
        let pictureList = [];
        @foreach ($markers as $m)
            pictureList.push("{{asset('storage/' . $m->pattern->image)}}");
        @endforeach
        let currentCount = 0;
        let markerTimeouts = {};

        function loadingTaskCompletion() {
            currentCount++;
            if (currentCount >= 5) {
                finalOutput();
                sessionStorage.setItem('task1Complete', 'true');
                
            } else {
                boolBox.innerHTML = `Currently doing Task 1, Part ${currentCount + 1}`;
                updateOutput(pictureList[currentCount]);
            }
        }

        function updateOutput(image){
            popupImage.src = image;
            popup.style.display = 'block';
        }

        function finalOutput(){
            popup.style.display = 'block';
            const popupText = document.getElementById("popupText");
            popupText.textContent = "Good job!!!"
        }
        closePopup.addEventListener('click', function () {
            popup.style.display = 'none';
        });

        window.addEventListener('load', function () {
            popup.style.display = 'block';
        });

        // const markers = [
        //     { marker: marker1, avideo: avideo1, video: video1, count: 0 },
        //     { marker: marker2, avideo: avideo2, video: video2, count: 1 },
        //     { marker: marker3, avideo: avideo3, video: video3, count: 2 },
        //     { marker: marker4, avideo: avideo4, video: video4, count: 3 },
        //     { marker: marker5, avideo: avideo5, video: video5, count: 4 },
        // ];
        
        const markers = [];
        @foreach ($markers as $m)
            markers.push({
                marker: marker{{$loop->iteration}},
                avideo: avideo{{$loop->iteration}},
                video: video{{$loop->iteration}},
                count: {{$loop->index}}
            });
        @endforeach

        markers.forEach(item => {
            const { marker, avideo, video, count } = item;

            marker.addEventListener('markerFound', function () {
                if (currentCount == count) {
                    avideo.setAttribute('visible', 'true');
                    video.play();

                    markerTimeouts[marker.id] = setTimeout(() => {
                        loadingTaskCompletion();
                    }, video.duration * 1000);
                }
            });

            marker.addEventListener('markerLost', function () {
                clearTimeout(markerTimeouts[marker.id]);
                avideo.setAttribute('visible', 'false');
                video.pause();
                video.currentTime = 0;
            });
        });
    </script>
</body>
</html>


