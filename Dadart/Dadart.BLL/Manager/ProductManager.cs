using Dadart.BLL.Model.Product;
using System;

using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Manager
{
    class ProductManager : DefaultManager
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

    }
}
