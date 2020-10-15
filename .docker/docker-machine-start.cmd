REM Starting Docker
docker-machine start default
REM Mounting share folder ("code")
docker-machine ssh default "sudo mkdir /code && sudo mount -t vboxsf kvazarnt.ru /code && sudo chmod 0777 -R /code"
docker-machine ssh default "sudo mkdir /b2d && sudo mount -t vboxsf b2d /b2d && sudo chmod 0777 -R /b2d"
REM Starting Docker Compose
cd ../
docker-compose up -d