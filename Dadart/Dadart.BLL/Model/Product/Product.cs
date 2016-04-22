using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dadart.BLL.Model.Product
{
    public class Product
    {
        public Guid ProductId { get; set; }
        public string Name { get; set; }
        public float Price { get; set; }
        public bool Auction { get; set; }
        public float Increment { get; set; }
        public float Weight { get; set; }
        public string LongDescription { get; set; }
        public string Image { get; set; }
        public Guid ArtistId { get; set; }
    }
}
