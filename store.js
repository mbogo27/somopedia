(function(){
    if(!window.indexedDB){
        console.log(`Your browser doesn't support IndexedDB`)
    }
    const request=indexedDB.open('somoDB',1)
    request.onerror=(event)=>{
        console.log(`Database Error: ${event.target.errorCode}`)
    }
    let db;
    request.onsuccess=(event)=>{

        request.onupgradeneeded=(event)=>{
            db=event.target.result
    
            let store=db.createObjectStore('Contacts',{
                autoIncrement:true
            })
    
            let index=store.createIndex('email','email',{
                unique:true
            })
        }
        
        insertContact(db,{
            email: 'john.doe@outlook.com',
            firstName: 'John',
            lastName: 'Doe'
        })

        insertContact(db,{
            email: 'jane.doe@gmail.com',
            firstName: 'Jane',
            lastName: 'Doe'
        })
        
        console.log('success')
    }

    function insertContact(db,contact){
        const txn=db.transaction('Contacts','readwrite')
        const store=txn.objectStore('Contacts')
        let query=store.put(contact)

        query.onsuccess=function(event){
            console.log(event)
        }
        query.onerror=function(event){
            console.log(event.target.errorCode)
        }

        txn.oncomplete=function(){
            db.close();
        }
    }
})();