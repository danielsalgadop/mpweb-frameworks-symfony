curl 127.0.0.1:8000/product/ | jq
curl 127.0.0.1:8000/product/1/ -X DELETE | jq
curl 127.0.0.1:8000/product/ -X POST -d '{"name":"productconCurl", "price":"69", "description":"desde CURL", "ownerId":"1"}' | jq
curl 127.0.0.1:8000/product/3/ -X PUT -d '{"name":"updatedName","price":"69","description":"descriptionUpdate"}' | jq
curl 127.0.0.1:8000/owner/ | jq
curl 127.0.0.1:8000/owner/ -X POST -d '{"name":"ponerNombreAqui"}' | jq

