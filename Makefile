install:
	composer install

validate:
	composer validate

lint: #поиск помарок
	composer exec --verbose phpcs -- --standard=PSR12 src bin

run:
	./bin/run