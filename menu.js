 let openShopping = document.querySelector('.shopping');  
 let closeShopping = document.querySelector('.closeShopping');  
 let list = document.querySelector('.list');  
 let listCard = document.querySelector('.listCard');  
 let body = document.querySelector('body');  
 let total = document.querySelector('.total');  
 let quantity = document.querySelector('.quantity');  
 let sgs =document.querySelector('.sgs');
 let cgs =document.querySelector('.cgs');
 let finaltota =document.querySelector('.finaltota');


  openShopping.addEventListener('click', ()=>{  
      body.classList.add('active');  
  })  
  closeShopping.addEventListener('click', ()=>{  
      body.classList.remove('active');  
  })  
  
  let products = [  
  
      {  
          id: 4,  
          name: 'RED SAUCE PASTA',  
          image: 'https://www.bigbasket.com/media/uploads/recipe/w-l/2534_1_1.jpg',  
          price: 250,
          des: 'Indulge in our tantalizing Red Sauce Pasta, a flavorful symphony of al dente perfection. Let the rich tomato sauce, infused with aromatic herbs, whisk you away to culinary bliss. Experience passion on every plate. '
      },  
      {  
          id: 5,  
          name: 'MAHARASHTRIAN THALI',  
          image: 'https://lh3.googleusercontent.com/rNns3fLSB6agVZm-JIocrTO261oS3rfMLlaec-SspxWOQ1qa7ZMo0ATdAB4cTVINIf2bgNNhEG_caTD61W4SmDvP3Jg=w500-r',  
          price: 550,
          des:'Experience the vibrant flavors of Maharashtra with our tantalizing Maharashtrian Thali. Indulge in a captivating assortment of authentic dishes that showcase the region rich culinary heritage. From aromatic spices to mouthwatering curries, each bite takes you on a journey through the diverse flavors of Maharashtra. Discover a symphony of taste and tradition in every carefully curated thali.'
      },  
      {  
          id: 6,  
          name: 'HAM-BURGER',  
          image: 'https://static.toiimg.com/photo/79693966.cms',  
          price: 350,
          des:'Unleash your cravings with our irresistible hamburger. Sink your teeth into pure temptation as juicy meat, melted cheese, and fresh toppings unite in a perfect harmony of flavors. One bite and youl be hooked, enchanted by the seductive allure of our mouthwatering creation.</p> '
        
      }  
  ];  
  let listCards = [];  
  function initApp(){  
      products.forEach((value, key) =>{  
          let newDiv = document.createElement('div');  
          newDiv.classList.add('item');  
          newDiv.innerHTML = `  
              <img src="${value.image}"> 
              <div class="title">${value.name}</div>  
              <div class="price">${value.price.toLocaleString()}</div> 
              <div>${value.des}</div> 
              <button onclick="addToCard(${key})">Add To Card</button>`;  
          list.appendChild(newDiv);  
      })  
  }  
  initApp();  
  function addToCard(key){  
      if(listCards[key] == null){  
          // copy product form list to list card  
          listCards[key] = JSON.parse(JSON.stringify(products[key]));  
          listCards[key].quantity = 1;  
      }  
      reloadCard();  
  }  





  function reloadCard(){  
      listCard.innerHTML = '';  
      let count = 0;  
      let totalPrice = 0;
      let sgst =0;
      let cgst =0;
      let finaltotal =0;
      listCards.forEach((value, key)=>{  
          totalPrice = totalPrice + value.price;  
          count = count + value.quantity;
          sgst = sgst + value.price*0.05;
          cgst = cgst + value.price*0.05; 
          finaltotal = finaltotal + value.price*1.1

          if(value != null){  
              let newDiv = document.createElement('li');  
              newDiv.innerHTML = `  
                  <div><img src="image/${value.image}"/></div>  
                  <div>${value.name}</div>  
                  <div>${value.price.toLocaleString()}</div>  
                  <div>  
                      <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>  
                      <div class="count">${value.quantity}</div>  
                      <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>  
                  </div>`;  
                  listCard.appendChild(newDiv);  
          }  
      })
      
      total.innerText = totalPrice.toLocaleString();  
      quantity.innerText = count;
      sgs.innerText = sgst.toLocaleString();
      cgs.innerText = sgst.toLocaleString();
      finaltota.innerText = finaltotal.toLocaleString();
  }  






  function changeQuantity(key, quantity){  
      if(quantity == 0){  
          delete listCards[key];  
      }else{  
          listCards[key].quantity = quantity;  
          listCards[key].price = quantity * products[key].price;  
      }  
      reloadCard();  
  }
