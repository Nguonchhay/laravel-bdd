Welcome to Testing Integration in Laravel
=========================================

## How to run testing in local

	1. Up your docker: `bin/dockerlaravel up -d`
	
	2. Set up environment `.env.behat` with the following contents:
	
		APP_ENV=behat
		APP_KEY=your-app-generated-key
		APP_DEBUG=true
		APP_LOG_LEVEL=debug
		APP_URL=http://your-domain:8080
		
		DB_CONNECTION=mysql
		DB_HOST=db
		DB_PORT=3306
		DB_DATABASE=dockerlaravel_test
		DB_USERNAME=root
		DB_PASSWORD=root
		
		BROADCAST_DRIVER=log
		CACHE_DRIVER=file
		SESSION_DRIVER=file
		QUEUE_DRIVER=sync
		
		REDIS_HOST=127.0.0.1
		REDIS_PASSWORD=null
		REDIS_PORT=6379
		
		MAIL_DRIVER=smtp
		MAIL_HOST=smtp.mailtrap.io
		MAIL_PORT=2525
		MAIL_USERNAME=null
		MAIL_PASSWORD=null
		MAIL_ENCRYPTION=null
		
		PUSHER_APP_ID=
		PUSHER_APP_KEY=
		PUSHER_APP_SECRET=

	3. Go to `app` container: `bin/dockerlaravel run app /bin/bash`
	
	4. Running test: `bin/behat -c behat.yml --suite=default -p local`

## More detail of using docker with Laravel

	[Nguonchhay/DockerLaravel](https://github.com/Nguonchhay/Nguonchhay.DockerLaravel)
