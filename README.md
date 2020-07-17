# Metronic 7 + Laravel 7

### Kurulum

Laravel, belirli bir ortamda sorunsuz bir şekilde çalışmak için bir dizi gereksinime sahiptir. Lütfen Laravel belgelerindeki [gereksinimler] (https://laravel.com/docs/7.x#server-requirements) bölümüne bakın.

Makinenizin tüm gereksinimleri karşıladığını varsayarsak - Metronic Laravel entegrasyonunun (iskelet) kurulumuna geçelim.

1. cmd veya terminal uygulamasında açın ve bu klasöre gidin
2. Aşağıdaki komutları çalıştırın

```bash
composer install veya composer update
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan config:clear
```

```bash
php artisan migrate
```

```bash
php artisan Otogaraj:roles
```

```bash
php artisan db:Seed
```

```bash
php artisan serve
```
Ve oluşturulan sunucu bağlantısına gidin (http://127.0.0.1:8000)

### Tüm Hakları Saklıdır Kodgaraj

