
robson:
	git config --global user.name "robson-gomes"
	git config --global user.email robson.gs2630@gmail.com
alisson:
	git config --global user.name "AlissonThyago"
	git config --global user.email alissonthiagoamorim@gmail.com
filipe:
	git config --global user.name "filipeandrev"
	git config --global user.email filipe.andrev7@gmail.com
conf:
	composer install --no-scripts
	cp .env.example .env # copia o example
	php artisan key:generate # gera a chave
	

