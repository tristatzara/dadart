using Dadart.BLL.Model.Product;
using System;

using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Manager
{
    public class ProductManager : DefaultManager
    {
        
        public ProductManager():base()
        {
                
        }

        public Product GetProductDetail(string productId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/product/detail/" + productId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Product>().Result;
                throw new Exception();
            }
            catch(Exception)
            {
                throw;
            }
        }

        public Profile GetProductProfile(string productId)
        {
            try
            {
                var respone = Client.GetAsync("WebService.php/api/product/profile/" + productId).Result;
                if (respone.IsSuccessStatusCode)
                    return respone.Content.ReadAsAsync<Profile>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public Artist GetProductArtist(string artistId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/artist/product/" + artistId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Artist>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }
        
        public string PostProduct(Product product, Profile profile)
        {
            try
            {
                var response = Client.PostAsJsonAsync<Product>("WebService.php/api/products/newProduct", product).Result;
                if (response.IsSuccessStatusCode)
                {
                    var productProfile = new ProductProfile()
                    {
                        ProductId = product.ProductId,
                        ProfileId = profile.ProfileId
                    };
                    response = Client.PostAsJsonAsync("WebService.php/api/products/addProductToProfile", productProfile).Result;
                    if (response.IsSuccessStatusCode)
                        return "L'inserimento del nuovo prodotto è andato a buon fine.";
                }

                    
                throw new Exception("Vi è stato un problema con l'inserimento del nuovo prodotto. Prego riprovare più tardi.");
            }
            catch(Exception)
            {
                throw;
            }
        }

        public void PutPrice(Product product)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/products/detail/" + product.ProductId).Result;
                if (response.IsSuccessStatusCode)
                {
                    var url = response.Headers.Location;

                    response = Client.PutAsJsonAsync(url, product).Result;
                }
            }
            catch(Exception ex)
            {
                throw new Exception( "Vi è stato un problema con l'aggiornamento del prezzo del prodotto, riprovare più tardi.");
            }
        }
    }
}
