using Dadart.BLL.Model.Cart;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Manager
{
    public class CartManager : DefaultManager
    {
        public CartManager():base()
        {           
        }

        public Product GetCartProduct(string productId)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/product/cart/" + productId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Product>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        } 
        public void PostCartProduct(Product cartProduct)
        {
            try
            {
                
            }
            catch (Exception)
            {
                throw;
            }
        } 
    }
}
