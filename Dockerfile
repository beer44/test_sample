FROM ubuntu:latest

RUN apt-get update

RUN apt-get install -y sudo wget vim curl unzip less expect

RUN apt-get install -y php php-mbstring php-curl libonig-dev

WORKDIR /app