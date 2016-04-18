using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Http;
using System.Text;
using System.Threading.Tasks;

namespace ClassLibrary1.Model
{
    public class CatalogModel
    {
        public  ICollection<Catalog> GetCatalog()
        {
            using(var client = new HttpClient())
            {
                client.BaseAddress = new Uri("http://localhost:8081/");
                client.DefaultRequestHeaders.Accept.Clear();
                client.DefaultRequestHeaders.Accept.Add(new System.Net.Http.Headers.MediaTypeWithQualityHeaderValue("application/json"));

                var response =  client.GetAsync("ws/WebService.php/api/catalog").Result;
                if (response.IsSuccessStatusCode)
                {
                    return response.Content.ReadAsAsync<ICollection<Catalog>>().Result;
                   
                }
            }
            return null;
        }
    }
}
