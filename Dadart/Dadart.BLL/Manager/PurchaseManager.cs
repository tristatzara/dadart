using Dadart.BLL.Model.Purchase;
using System;
using System.Net.Http;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Manager
{
    class PurchaseManager : DefaultManager
    {
        public PurchaseManager() : base()
        {
        }

        public Product GetPurchaseProduct(string productId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/products/" + productId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Product>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        } 

        public Purchase GetPurchase(string purchaseId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/purchase/" + purchaseId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<Purchase>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public List<Purchase> GetAllPurchase(string profileId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/purchase/profile/" + profileId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<Purchase>>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }

        public List<PurchaseDetail> GetPurchaseDetail(string purchaseId)
        {
            try
            {
                var response = Client.GetAsync("WebService.php/api/purchase/detail/" + purchaseId).Result;
                if (response.IsSuccessStatusCode)
                    return response.Content.ReadAsAsync<List<PurchaseDetail>>().Result;
                throw new Exception();
            }
            catch (Exception)
            {
                throw;
            }
        }
    }
}
