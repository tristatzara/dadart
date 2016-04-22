using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using Dadart.BLL.Model.Catalog;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Manager
{
    public class CatalogManager : DefaultManager
    {
        
        public CatalogManager():base()
        {
        }

        public List<Catalog> GetAllCatalog()
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/catalog").Result;
                if (response.IsSuccessStatusCode)
                {
                    return response.Content.ReadAsAsync<List<Catalog>>().Result;
                }
                throw new Exception();
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public  List<Category> GetAllCategory(string catalogName)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/catalog/" + catalogName).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Category>>().Result;
                throw new Exception();
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public List<Category> GetAllSubCategory(string catalogName, string categoryName)
        {
            try
            {
                var response =  Client.GetAsync("/WebService.php/api/catalog/" + catalogName + "/" + categoryName).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Category>>().Result;
                throw new Exception();
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public List<Category> GetAllSubCategory(string catalogName, string categoryName, string subCategoryName)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/catalog/" + catalogName + "/" + categoryName + "/" + subCategoryName).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Category>>().Result;
                throw new Exception();
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public List<Product> GetAllCategoryProduct(string categorygName)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/products/" + categorygName).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Product>>().Result;
                throw new Exception();
            }
            catch (Exception ex)
            {
                throw;
            }
        }

        public List<Product> GetAllSubCategoryProduct(string categoryName, string subCategoryName)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/products/" + categoryName + "/" + subCategoryName).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Product>>().Result;
                throw new Exception();            
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public List<Product> GetAllProduct()
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/products/all").Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Product>>().Result;
                throw new Exception();
            }
            catch(Exception ex)
            {
                throw;
            }
        }

        public Artist GetArtist(string artistId)
        {
            try
            {
                var response = Client.GetAsync("/WebService.php/api/artist/product/" + artistId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Artist>().Result;
                throw new Exception();
            }
            catch(Exception){
                throw;
            }
        }
    }
}
