# CariKost2an
Ini merupakan repository untuk prototipe API untuk menajemen ruangan pada portal pencarian kost2an. 

Setiap request harus menyertakan header Authorization dengan nilai : _BEARER API_KEY_USER_ .
API_KEY bisa ditemukan di table users pada kolom **api_key** .

## Installation
Clone projek ke local komputer dengan menggunakan perintah berikut :
```
git clone https://github.com/alimshare/CariKost2an.git
```

Kemudian jalankan perintah berikut pada folder project yang sudah di clone untuk mendownload dependency yang diperlukan : 
```
composer install
```

Setelah itu, setting koneksi ke database pada file **.env** dan jalankan perintah berikut untuk generate table dan data yang dibutuhkan aplikasi : 
```
php artisan migrate:refresh --seed
```

## Running
Untuk menjalankan API, gunakan perintah berikut :
```
php artisan serve
```

##  Dokumentasi

Untuk dokumentasi mengenai API yang tersedia, silahkan dilihat pada link berikut : [Documentation](https://documenter.getpostman.com/view/3418794/RWgxvFNc)

atau silahkan download dokumentasi API berikut pada link berikut : [POSTMAN_COLLECTION](https://www.dropbox.com/s/csv2aej82eir6fx/CariKost2an.postman_collection_v21.json?dl=0)

